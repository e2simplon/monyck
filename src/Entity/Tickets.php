<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TicketsRepository")
 */
class Tickets
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;


    /**
     * @ORM\Column(type="string", length=500)
     */
    private $description;


    /**
     * @ORM\Column(type="date")
     */
    private $creationDate;


    /**
     * @ORM\Column(type="time")
     */
    private $expTime;

// ------------ many to one ---------
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Skills", inversedBy="tickets")
     * @ORM\JoinColumn(name="skill_id", referencedColumnName="id")
     */
    private $skill;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users", inversedBy="tickets")
     * @ORM\JoinColumn(name="userTicket_id", referencedColumnName="id")
     */
    private $user;


// ----------- one to many ---------
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Offers", mappedBy="ticket")
     */
    private $offers;


// ----------------------------------
    public function __construct()
    {
        $this->offers = new ArrayCollection();
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param mixed $creationDate
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return mixed
     */
    public function getExpTime()
    {
        return $this->expTime;
    }

    /**
     * @param mixed $expTime
     */
    public function setExpTime($expTime)
    {
        $this->expTime = $expTime;
    }

    /**
     * @return mixed
     */
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * @param mixed $skill
     */
    public function setSkill($skill)
    {
        $this->skill = $skill;
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
    public function getOffers()
    {
        return $this->offers;
    }

    /**
     * @param mixed $offers
     */
    public function setOffers($offers)
    {
        $this->offers = $offers;
    }


}
