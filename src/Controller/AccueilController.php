<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccueilController extends Controller
{
    /**
     * @Route("/")
     */
    public function header()
    {
        $projet="Accueil";
        return $this->render('accueil.html.twig', array(
            'projet' => $projet,
        ));
    }
}