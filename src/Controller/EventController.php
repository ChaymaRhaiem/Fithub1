<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EventRepository;
use App\Repository\TicketRepository;
use App\Entity\Ticket;
use App\Entity\Event;
use App\Form\EventType;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;
use Doctrine\ORM\EntityManagerInterface;

use App\Form\TicketType;


class EventController extends AbstractController
{
    #[Route('/event', name: 'app_event')]
    public function index(EventRepository $eventRepository): Response
    {
        $events = $eventRepository->findAll();
    
        return $this->render('event/index.html.twig', [
            'events' => $events
        ]);
    }
     #[Route("/event", name:"app_event")]
    
    public function eventsList(): Response
    {
        $events = $this->getDoctrine()->getRepository(Event::class)->findAll();

        return $this->render('event/index.html.twig', [
            'events' => $events,
        ]);
    }


   
    
     #[Route("/event/{id}/details", name:"event_details")]
    public function eventDetails(Event $event): Response
    {
        return $this->render('event/detail.html.twig', [
            'event' => $event,
        ]);
    }


   

    #[Route('eventadmin', name: 'app_event_admin')]
    public function adminindex(EventRepository $eventRepository): Response
    {
        $events = $eventRepository->findAll();
        return $this->render('eventadmin/index.html.twig', [
            'events' => $events,
        ]);
    }

    #[Route('eventadmin/new', name: 'app_event_admin_new')]
    public function new(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $event = new Event();
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($event);
            $image = $form->get('image')->getData();

            // this condition is needed because the 'brochure' field is not required
            if ($image) {
                $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$image->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $image->move(
                        $this->getParameter('event_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the  file name
                // instead of its contents
                $event->setImage($newFilename);
            }
            $entityManager->flush();

            return $this->redirectToRoute('app_event_admin');
        }

        return $this->render('eventadmin/new.html.twig', [
            'event' => $event,
            'form' => $form->createView(),
        ]);
    }

    #[Route('eventadmin/show/{id}', name: 'app_event_admin_show')]
    public function show(Event $event): Response
    {
        return $this->render('eventadmin/show.html.twig', [
            'event' => $event,
        ]);
    }

    #[Route('eventadmin/edit/{id}', name: 'event_edit')]
    public function edit(Request $request, Event $event, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_event_admin');
        }

        return $this->render('eventadmin/edit.html.twig', [
            'event' => $event,
            'form' => $form->createView(),
        ]);
    }

    #[Route('eventadmin/delete/{id}', name: 'event_delete')]
    public function delete(Request $request, Event $event, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$event->getId(), $request->request->get('_token'))) {
            $entityManager->remove($event);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_event_admin');
    }
}
