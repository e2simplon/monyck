<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Users;
use App\Entity\UserTypes;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/user", name="user_view")
     */

    public function user()
    {
        $projet="Users";

        $users = $this->getDoctrine()
            ->getRepository(Users::class)
            ->findAll();

        return $this->render('user/user.html.twig', array(
            'projet' => $projet,
            'users' => $users,
        ));
    }

    /**
     * @Route("/user/add")
     */
    public function addUser(Request $request)
    {
        $projet="Add User";

        $types = $this->getDoctrine()
            ->getRepository(UserTypes::class)
            ->findAll();

        $user = new Users();
        $form = $this->createFormBuilder($user)
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('email', EmailType::class)
            ->add('login', TextType::class)
            ->add('password', PasswordType::class)
            ->add('birthdate', BirthdayType::class)
            ->add('user_types', EntityType::class, array(
                'class' => UserTypes::class,
                'multiple' => 'true',
                'choices' => $types,
            ))
            ->add('save', SubmitType::class, array('label' => 'Submit'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('user_view');
        }

        return $this->render('user/add.html.twig', array(
            'projet' => $projet,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/user/edit/{id}")
     * requirements={
     *         "id": "\d+"
     *     }
     */

    public function editUser(Request $request,$id)
    {
        $projet = "Edit User";

        $types = $this->getDoctrine()
            ->getRepository(UserTypes::class)
            ->findAll();

        $repository = $this->getDoctrine()->getRepository(Users::class);
        $user = $repository->find($id);

        $form = $this->createFormBuilder($user)
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('email', EmailType::class)
            ->add('login', TextType::class)
            ->add('password', PasswordType::class)
            ->add('birthdate', BirthdayType::class)
            ->add('user_types', EntityType::class, array(
                'class' => UserTypes::class,
                'multiple' => 'true',
                'choices' => $types,
            ))
            ->add('save', SubmitType::class, array('label' => 'Submit'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $type = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($type);
            $em->flush();

            return $this->redirectToRoute('user_view');
        }

        return $this->render('type/edit.html.twig', array(
            'projet' => $projet,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/user/delete/{id}")
     * requirements={
     *         "id": "\d+"
     *     }
     */

    public function deleteUser($id)
    {
        $repository = $this->getDoctrine()->getRepository(Users::class);
        $user = $repository->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();

        return $this->redirectToRoute('user_view');
    }


}