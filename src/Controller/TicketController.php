<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

use App\Form\AdminTicketType;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Event;
use App\Repository\TicketRepository;
use App\Entity\Ticket;
use App\Form\TicketType;
use Doctrine\ORM\EntityManagerInterface;

class TicketController extends AbstractController
{

    #[Route("/eventadmin/{id}/ticket/new", name:"event_ticket_new")]
    public function new(Request $request, EntityManagerInterface $entityManager, Event $event): Response
    {
        $ticket = new Ticket();
        $ticket->setEvent($event);
        $form = $this->createForm(AdminTicketType::class, $ticket);

        $ticket->setDisponibilite(true); // set disponibilite to true by default

    
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ticket);
            $entityManager->flush();
    
            $this->addFlash('success', 'Ticket added successfully.');
    
            return $this->redirectToRoute('admin_ticket_index', ['id' => $event->getId()]);
        }
    
        return $this->render('ticket_admin/new.html.twig', [
            'event' => $event,
            'form' => $form->createView(),
        ]);
}
    #[Route("/ticketadmin", name:"admin_ticket_index")]
   public function index(TicketRepository $ticketRepository): Response
   {
       $tickets = $ticketRepository->findAll();

       return $this->render('ticket_admin/index.html.twig', [
           'tickets' => $tickets,
       ]);
   }
   #[Route('ticketadmin/delete/{id}', name: 'ticket_delete')]
   public function delete(Request $request, Ticket $ticket, EntityManagerInterface $entityManager): Response
   {
       if ($this->isCsrfTokenValid('delete'.$ticket->getId(), $request->request->get('_token'))) {
           $entityManager->remove($ticket);
           $entityManager->flush();
       }
   
       return $this->redirectToRoute('admin_ticket_index');
   }
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
           $ticket->setDisponibilite(true);
           $ticket->setBookingDate(new \DateTime());
           $ticket->setNom($form->get('nom')->getData());
           $ticket->setEmail($form->get('email')->getData());
   
           $entityManager = $this->getDoctrine()->getManager();
           $entityManager->persist($ticket);
           $entityManager->flush();
   
           return $this->redirectToRoute('event_details', ['id' => $id]);
       }
   
       return $this->render('ticket/index.html.twig', [
           'ticket' => $ticket,
           'event' => $event,
           'form' => $form->createView(),
       ]);
   }
    #[Route("ticketadmin/{id}/edit", name:"admin_ticket_edit")]
   public function edit(Request $request, Ticket $ticket): Response
   {
       $form = $this->createForm(AdminTicketType::class, $ticket);
       $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()) {
           $this->getDoctrine()->getManager()->flush();

           return $this->redirectToRoute('admin_ticket_index');
       }

       return $this->render('ticket_admin/edit.html.twig', [
           'ticket' => $ticket,
           'form' => $form->createView(),
       ]);
   }


}