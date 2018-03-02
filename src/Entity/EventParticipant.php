<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventParticipantRepository")
 */
class EventParticipant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * unique FK identifier of the Google calendar event
     */
    private $EventId;

    /**
     * @ORM\Column(type="string")
     * unique text ID if the user who created the event
     */
    private $UserId;

    /**
     * @ORM\Column(type="string")
     * attendee name
     */
    private $Name;

    /**
     * @ORM\Column(type="string")
     * attendee email;
     */
    private $Email;

    /**
     * @ORM\Column(type="string")
     * attendee phone number
     */
    private $PhoneNumber;

    /**
     * @ORM\Column(type="boolean")
     */
    private $IsSpeaker;

    /**
     * @ORM\Column(type="string")
     * dates attending
     */
    private $DatesAttending;

    /**
     * @ORM\Column(type="boolean")
     * attendee name
     */
    private $AvailableToConnect;

    /**
     * @ORM\Column(type="string")
     * location
     */
    private $HotelLocation;

    /**
     * @ORM\Column(type="text")
     * comment
     */
    private $Comment;
}
