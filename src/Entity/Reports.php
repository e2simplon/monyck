<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReportsRepository")
 */
class Reports
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $explanation;

    /**
     * @ORM\Column(type="float")
     */
    private $relation;

    /**
     * @ORM\Column(type="float")
     */
    private $comitment;

// ------------ many to one ---------

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Offers", inversedBy="reports")
     * @ORM\JoinColumn(name="offer_id", referencedColumnName="id")
     */
    private $offer;

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
    public function getExplanation()
    {
        return $this->explanation;
    }

    /**
     * @param mixed $explanation
     */
    public function setExplanation($explanation)
    {
        $this->explanation = $explanation;
    }

    /**
     * @return mixed
     */
    public function getRelation()
    {
        return $this->relation;
    }

    /**
     * @param mixed $relation
     */
    public function setRelation($relation)
    {
        $this->relation = $relation;
    }

    /**
     * @return mixed
     */
    public function getComitment()
    {
        return $this->comitment;
    }

    /**
     * @param mixed $comitment
     */
    public function setComitment($comitment)
    {
        $this->comitment = $comitment;
    }

    /**
     * @return mixed
     */
    public function getOffer()
    {
        return $this->offer;
    }

    /**
     * @param mixed $offer
     */
    public function setOffer($offer)
    {
        $this->offer = $offer;
    }




}
