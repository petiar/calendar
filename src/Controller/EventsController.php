<?php
/**
 * Created by PhpStorm.
 * User: petiar
 * Date: 02/03/2018
 * Time: 12:41
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EventsController extends Controller
{
    public function __construct()
    {
        $request = Request::createFromGlobals();
        print_r($request->query->get('username'));
    }

    public function index()
    {
        $calendar = new \App\Controller\CalendarController();
        $events = $calendar->getEvents();
        return $this->render('events.html.twig', array('events' => $events));
    }

    public function subscribe($id)
    {
        
    }

    public function event($id)
    {
        $calendar = new \App\Controller\CalendarController();
        $event = $calendar->getEvent($id);
        return $this->render('event.html.twig', array('event' => $event));
    }
}