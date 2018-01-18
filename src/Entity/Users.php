<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Form\FormTypeInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 */
class Users
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $password;

    /**
     * @ORM\Column(type="date")
     */
    private $birthdate;

// ---------- many to many ---------

    /**
     * Many Users have Many UserTypes.
     * @ORM\ManyToMany(targetEntity="UserTypes", inversedBy="users",cascade={"persist"})
     * @ORM\JoinTable(name="user_types_users",
     *      joinColumns={@ORM\JoinColumn(name="id_user", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_user_type", referencedColumnName="id")}
     *      )
     */
    private $user_types;


// ----------- one to many ---------
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Transactions", mappedBy="receiver")
     */
    private $receivers;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Transactions", mappedBy="sender")
     */
    private $senders;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tickets", mappedBy="user")
     */
    private $tickets;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Offers", mappedBy="user")
     */
    private $offers;




// ------------ many to one ---------


// ----------------------------------
    public function __construct()
    {
        $this->transactions = new ArrayCollection();
        $this->tickets = new ArrayCollection();
        $this->offers = new ArrayCollection();
        $this->senders = new ArrayCollection();
        $this->receivers = new ArrayCollection();
        $this->user_types = new ArrayCollection();
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
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param mixed $birthdate
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @return mixed
     */
    public function getUserTypes()
    {
        return $this->user_types;
    }

    /**
     * @param mixed $user_types
     */
    public function setUserTypes($user_types)
    {
        $this->user_types = $user_types;
    }

    /**
     * @return mixed
     */
    public function getuser_types()
    {
        return $this->user_types;
    }

    /**
     * @param mixed $user_types
     */
    public function setuser_types($user_types)
    {
        $this->user_types = $user_types;
    }

    /**
     * @return mixed
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * @param mixed $transactions
     */
    public function setTransactions($transactions)
    {
        $this->transactions = $transactions;
    }

    /**
     * @return mixed
     */
    public function getTickets()
    {
        return $this->tickets;
    }

    /**
     * @param mixed $tickets
     */
    public function setTickets($tickets)
    {
        $this->tickets = $tickets;
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



    /**
     * @return Collection|Transaction[]
     */
    public function getReceivers()
    {
        return $this->receivers;
    }

    /**
     * @return Collection|Transaction[]
     */
    public function getSenders()
    {
        return $this->senders;
    }


// --------------- ????? -------------------

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param mixed $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }
}
