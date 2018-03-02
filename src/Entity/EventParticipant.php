<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Form;

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

    /**
     * @return mixed
     */
    public function getEventId()
    {
        return $this->EventId;
    }

    /**
     * @param mixed $EventId
     */
    public function setEventId($EventId): void
    {
        $this->EventId = $EventId;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->UserId;
    }

    /**
     * @param mixed $UserId
     */
    public function setUserId($UserId): void
    {
        $this->UserId = $UserId;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param mixed $Name
     */
    public function setName($Name): void
    {
        $this->Name = $Name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param mixed $Email
     */
    public function setEmail($Email): void
    {
        $this->Email = $Email;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->PhoneNumber;
    }

    /**
     * @param mixed $PhoneNumber
     */
    public function setPhoneNumber($PhoneNumber): void
    {
        $this->PhoneNumber = $PhoneNumber;
    }

    /**
     * @return mixed
     */
    public function getisSpeaker()
    {
        return $this->IsSpeaker;
    }

    /**
     * @param mixed $IsSpeaker
     */
    public function setIsSpeaker($IsSpeaker): void
    {
        $this->IsSpeaker = $IsSpeaker;
    }

    /**
     * @return mixed
     */
    public function getDatesAttending()
    {
        return $this->DatesAttending;
    }

    /**
     * @param mixed $DatesAttending
     */
    public function setDatesAttending($DatesAttending): void
    {
        $this->DatesAttending = $DatesAttending;
    }

    /**
     * @return mixed
     */
    public function getAvailableToConnect()
    {
        return $this->AvailableToConnect;
    }

    /**
     * @param mixed $AvailableToConnect
     */
    public function setAvailableToConnect($AvailableToConnect): void
    {
        $this->AvailableToConnect = $AvailableToConnect;
    }

    /**
     * @return mixed
     */
    public function getHotelLocation()
    {
        return $this->HotelLocation;
    }

    /**
     * @param mixed $HotelLocation
     */
    public function setHotelLocation($HotelLocation): void
    {
        $this->HotelLocation = $HotelLocation;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->Comment;
    }

    /**
     * @param mixed $Comment
     */
    public function setComment($Comment): void
    {
        $this->Comment = $Comment;
    }
}
