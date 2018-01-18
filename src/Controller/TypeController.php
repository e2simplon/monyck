<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\UserTypes;
use Symfony\Component\HttpFoundation\Request;

class TypeController extends Controller
{
    /**
     * @Route("/type", name="type_view")
     */
    public function type()
    {
        $projet="Type";

        $types = $this->getDoctrine()
            ->getRepository(UserTypes::class)
            ->findAll();


        return $this->render('type/type.html.twig', array(
            'projet' => $projet,
            'types' => $types
        ));
    } // fin de la fonction type()


    /**
     * @Route("/type/add")
     */
    public function addType(Request $request)
    {
        $projet="Add Type";

        $type = new UserTypes();
        $form = $this->createFormBuilder($type)
            ->add('type', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Submit'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $type = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($type);
            $em->flush();

            return $this->redirectToRoute('type_view');
        }

        return $this->render('type/add.html.twig', array(
            'projet' => $projet,
            'form' => $form->createView(),
        ));
    } // fin de la fonction addType()


    /**
     * @Route("/type/edit/{id}")
     * requirements={
     *         "id": "\d+"
     *     }
     */
    public function editType(Request $request,$id)
    {
        $projet = "Edit Type";

        $repository = $this->getDoctrine()->getRepository(UserTypes::class);
        $type = $repository->find($id);

        $form = $this->createFormBuilder($type)
            ->add('type', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Submit'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $type = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($type);
            $em->flush();

            return $this->redirectToRoute('type_view');
        }

        return $this->render('type/edit.html.twig', array(
            'projet' => $projet,
            'form' => $form->createView(),
        ));
    } // fin de la fonction editType()


    /**
     * @Route("/type/delete/{id}")
     * requirements={
     *         "id": "\d+"
     *     }
     */
    public function deleteType($id)
    {
        $repository = $this->getDoctrine()->getRepository(UserTypes::class);
        $type = $repository->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($type);
        $em->flush();

        return $this->redirectToRoute('type_view');
    } // fin de la fonction deleteType()

} // fin de la classe TypeController