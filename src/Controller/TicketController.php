<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Event;
use App\Repository\TicketRepository;
use App\Entity\Ticket;
use App\Form\TicketType;
use Doctrine\ORM\EntityManagerInterface;

class TicketController extends AbstractController
{
    #[Route('/event/{id}/book', name: 'event_book')]
    public function book(Request $request, $id, TicketRepository $ticketRepository): Response
    {
        $event = $this->getDoctrine()
            ->getRepository(Event::class)
            ->find($id);
    
        $ticket = new Ticket();
        $ticket->setEvent($event);
    
        $form = $this->createForm(TicketType::class, $ticket);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ticket);
            $entityManager->flush();
    
            return $this->redirectToRoute('app_event_show', ['id' => $id]);
        }
    
        return $this->render('ticket/index.html.twig', [
            'event' => $event,
            'form' => $form->createView(),
        ]);
    }
}