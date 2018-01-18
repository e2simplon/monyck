<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Transactions;
use App\Entity\TransactionTypes;
use App\Entity\Users;
use Symfony\Component\HttpFoundation\Request;

class TransactionController extends Controller
{
    /**
     * @Route("/transaction", name="transaction_view")
     */

    public function transaction()
    {
        $projet="Transaction";
        return $this->render('transaction/transaction.html.twig', array(
            'projet' => $projet,
        ));
    }

    /**
     * @Route("/transaction/add")
     */
    public function addTransaction(Request $request)
    {
        $projet="Add transaction";

        $types = $this->getDoctrine()
            ->getRepository(TransactionTypes::class)
            ->findAll();

        $transaction = new Transactions();
        $transaction->setTransfertDate(new \DateTime('now'));
        $form = $this->createFormBuilder($transaction)

            ->add('amount', IntegerType::class)
            ->add('transfertDate', DateTimeType::class)
            ->add('comment', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Submit'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('transaction_view');
        }

        return $this->render('transaction/add.html.twig', array(
            'projet' => $projet,
            'form' => $form->createView(),
        ));
    }



}