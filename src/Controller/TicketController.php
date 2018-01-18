<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class TicketController extends Controller
{
    /**
     * @Route("/ticket")
     */

    public function ticket()
    {
        $projet="Ticket";
        return $this->render('ticket/ticket.html.twig', array(
            'projet' => $projet,
        ));
    }


}