<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class OfferController extends Controller
{
    /**
     * @Route("/offer")
     */

    public function offer()
    {
        $projet="Offer";
        return $this->render('offer/offer.html.twig', array(
            'projet' => $projet,
        ));
    }
}