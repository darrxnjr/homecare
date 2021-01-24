<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecutityController extends AbstractController
{
    /**
     * @Route("/inscription", name="secutity_inscription")
     */

    public function registration(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();

        $form = $this->createForm(RegistrationFormType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $hash = $encoder->encodePassword($user, $user->getPassword());

            $user->setPassword($hash);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('login');
        }

        return $this->render('registration.html.twig', [
                'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function login(){
        return $this->render('login.html.twig');
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout(){}

}
