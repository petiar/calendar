<?php
/**
 * Created by PhpStorm.
 * User: petiar
 * Date: 02/03/2018
 * Time: 13:02
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;

class CalendarController
{
    private $id = "6d9bnutuoo30dgnivq738hnnk0@group.calendar.google.com";
    private $service;
    const CLIENT_SECRET_PATH = __DIR__ . '/../../config/petiar_secret.json';

    public function __construct()
    {
        $client = $this->getCalendarClient();
        $this->service = $this->getCalendarService($client);
    }

    public function getId() {
        return $this->id;
    }

    public function getCalendarClient()
    {
        $client = new \Google_Client();
        $client->setApplicationName("SPM Conference Meeting Place");
        $client->setAuthConfig(self::CLIENT_SECRET_PATH);
        $client->addScope(array(\Google_Service_Calendar::CALENDAR_READONLY));

        return $client;
    }

    public function getCalendarService($client)
    {
        $service = new \Google_Service_Calendar($client);
        return $service;
    }

    public function getEvents() {
        $events = $this->service->events->listEvents($this->getId());
        $items = array();
        foreach ($events->getItems() as $event) {
            $items[] = array(
                'id' => $event->getId(),
                'title' => $event->getSummary(),
                'body' => $event->getDescription(),
            );
        }
        return $items;
    }

    public function getEvent($id)
    {
        return $this->service->events->get($this->getId(), $id);
    }

}