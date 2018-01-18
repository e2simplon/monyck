<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TransactionsRepository")
 */
class Transactions
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
     * @ORM\Column(type="datetime")
     */
    private $transfertDate;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $comment;

// ------------ many to one ---------
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TransactionTypes", inversedBy="transactions")
     * @ORM\JoinColumn(name="transactionType_id", referencedColumnName="id")
     */
    private $transactionType;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users", inversedBy="receivers")
     * @ORM\JoinColumn(name="receiver_id", referencedColumnName="id")
     */
    private $receiver;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users", inversedBy="senders")
     * @ORM\JoinColumn(name="sender_id", referencedColumnName="id")
     */
    private $sender;


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
    public function getTransfertDate()
    {
        return $this->transfertDate;
    }

    /**
     * @param mixed $transfertDate
     */
    public function setTransfertDate($transfertDate)
    {
        $this->transfertDate = $transfertDate;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getTransactionType()
    {
        return $this->transactionType;
    }

    /**
     * @param mixed $transactionType
     */
    public function setTransactionType($transactionType)
    {
        $this->transactionType = $transactionType;
    }






    /**
     * @return mixed
     */
    public function getReceiver(): User
    {
        return $this->receiver;
    }

    /**
     * @param mixed $receiver
     */
    public function setReceiver(User $user)
    {
        $this->receiver = $user;
    }


    /**
     * @return mixed
     */
    public function getSender(): User
    {
        return $this->sender;
    }

    /**
     * @param mixed $sender
     */
    public function setSender(User $user)
    {
        $this->sender = $user;
    }

}
