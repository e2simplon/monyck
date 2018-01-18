<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class SkillController extends Controller
{
    /**
     * @Route("/skill")
     */

    public function skill()
    {
        $projet="Skill";
        return $this->render('skill/skill.html.twig', array(
            'projet' => $projet,
        ));
    }
}