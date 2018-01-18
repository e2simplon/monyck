<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


/**
 * @ORM\Entity(repositoryClass="App\Repository\OffersRepository")
 */
class Offers
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="integer")
     */
    private $amount;


    /**
     * @ORM\Column(type="time")
     */
    private $execTime;


    /**
     * @ORM\Column(type="boolean")
     */
    private $insurance;


// ------------ many to one ---------
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tickets", inversedBy="offers")
     * @ORM\JoinColumn(name="ticket_id", referencedColumnName="id")
     */
    private $ticket;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users", inversedBy="offers")
     * @ORM\JoinColumn(name="userOffer_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Status", inversedBy="offers")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     */
    private $status;


// ----------- one to many ---------

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reports", mappedBy="offer")
     */
    private $reports;


// ----------------------------------
    public function __construct()
    {
        $this->reports = new ArrayCollection();
    }

// ----------------------------------
// ------- GETTERS et SETTERS -------
// ----------------------------------

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getExecTime()
    {
        return $this->execTime;
    }

    /**
     * @param mixed $execTime
     */
    public function setExecTime($execTime)
    {
        $this->execTime = $execTime;
    }

    /**
     * @return mixed
     */
    public function getInsurance()
    {
        return $this->insurance;
    }

    /**
     * @param mixed $insurance
     */
    public function setInsurance($insurance)
    {
        $this->insurance = $insurance;
    }

    /**
     * @return mixed
     */
    public function getTicket()
    {
        return $this->ticket;
    }

    /**
     * @param mixed $ticket
     */
    public function setTicket($ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getReports()
    {
        return $this->reports;
    }

    /**
     * @param mixed $reports
     */
    public function setReports($reports)
    {
        $this->reports = $reports;
    }






}
