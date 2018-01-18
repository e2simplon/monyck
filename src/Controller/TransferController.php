<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class TransferController extends Controller
{
    /**
     * @Route("/transfer")
     */

    public function transfer()
    {
        $projet="Transfer";
        return $this->render('transfert/transfert.html.twig', array(
            'projet' => $projet,
        ));
    }
}