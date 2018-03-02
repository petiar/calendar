<?php
/**
 * Created by PhpStorm.
 * User: petiar
 * Date: 02/03/2018
 * Time: 12:41
 */

namespace App\Controller;

use App\Entity\EventParticipant;
use App\Form\EventParticipantType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EventsController extends Controller
{
    private $calendar;
    private $userId;

    public function __construct()
    {
        $request = Request::createFromGlobals();
        $this->userId = $request->query->get('username');

        $this->calendar = new \App\Controller\CalendarController();
    }

    public function index()
    {
        $events = $this->calendar->getEvents();
        return $this->render('events.html.twig', array('events' => $events));
    }

    public function subscribe($id, Request $request)
    {
        $event = $this->calendar->getEvent($id);
        $participant = new EventParticipant();
        $participant->setEventId($id);
        $participant->setUserId($this->userId);

        $form = $this->createForm(EventParticipantType::class, $participant, array(
            'method' => 'post'
        ));

        if ($request->getMethod() == "POST") {
            $entityManager = $this->getDoctrine()->getManager();

            $form->handleRequest($request);
            $data = $form->getData();
            dump($form->get('Name'));
            $participant = new EventParticipant();
            $participant->setName($form->get('Name')->getViewData());
            $participant->setUserId($this->userId);
            $participant->setEmail($form->get('Email')->getViewData());
            $participant->setEventId($id);
            $participant->setAvailableToConnect(TRUE);
            $participant->setComment('some comment');
            $participant->setDatesAttending('20-05-2019');
            $participant->setHotelLocation('London');
            $participant->setIsSpeaker(TRUE);
            $participant->setPhoneNumber('918 456 123');

            $entityManager->persist($participant);

            $entityManager->flush();

            $this->addFlash('notice','Event participation saved');
        }

        return $this->render('participate.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function event($id)
    {
        $event = $this->calendar->getEvent($id);
        return $this->render('event.html.twig', array('event' => $event));
    }
}