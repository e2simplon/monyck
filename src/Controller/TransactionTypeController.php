<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\TransactionTypes;
use Symfony\Component\HttpFoundation\Request;

class TransactionTypeController extends Controller
{
    /**
     * @Route("/transactionType", name="transactionType_view")
     */
    public function transactionType()
    {
        $projet="TransactionType";

        $types = $this->getDoctrine()
            ->getRepository(TransactionTypes::class)
            ->findAll();


        return $this->render('transactionType/transactionType.html.twig', array(
            'projet' => $projet,
            'types' => $types
        ));
    } // fin de la fonction type()


    /**
     * @Route("/transactionType/add")
     */
    public function addTransactionType(Request $request)
    {
        $projet="Add TransactionType";

        $type = new TransactionTypes();
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

            return $this->redirectToRoute('transactionType_view');
        }

        return $this->render('transactionType/add.html.twig', array(
            'projet' => $projet,
            'form' => $form->createView(),
        ));
    } // fin de la fonction addTransactionType()


    /**
     * @Route("/transactionType/edit/{id}")
     * requirements={
     *         "id": "\d+"
     *     }
     */
    public function editTransactionType(Request $request,$id)
    {
        $projet = "Edit Transaction Type";

        $repository = $this->getDoctrine()->getRepository(TransactionTypes::class);
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

            return $this->redirectToRoute('transactionType_view');
        }

        return $this->render('transactionType/edit.html.twig', array(
            'projet' => $projet,
            'form' => $form->createView(),
        ));
    } // fin de la fonction editTransactionType()


    /**
     * @Route("/transactionType/delete/{id}")
     * requirements={
     *         "id": "\d+"
     *     }
     */
    public function deleteTransactionType($id)
    {
        $repository = $this->getDoctrine()->getRepository(TransactionTypes::class);
        $type = $repository->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($type);
        $em->flush();

        return $this->redirectToRoute('transactionType_view');
    } // fin de la fonction deleteTransactionType()

} // fin de la classe TypeController