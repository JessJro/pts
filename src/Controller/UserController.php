<?php

namespace App\Controller;

use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class UserController extends AbstractController
{   

    #[Route('/user/edit/{id}', name: 'user.edit')]
    public function index(User $user, Request $request, EntityManagerInterface $em): Response
    {  
        if(!$this->getUser()){
            return $this->redirectToRoute('register');
        }
        if($this->getUser() !== $user){
            return $this->redirectToRoute('home');
        }
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();
            $file = $form->get('image')->getData();
            if ($file) {
                $original = pathInfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $uniqueName = $original . "-" . uniqid() . "." . $file->guessExtension();

                $file->move(
                    $this->getParameter('uploads'),
                    $uniqueName
                );
                $user->setImage($uniqueName);
            }
            $em->persist($user);
            $em->flush();
            $this->addFlash('success', 'Votre profil a bien été mis à jour');
            return $this->redirectToRoute('home');
        }
        return $this->render('user/edit.html.twig', [
            'user'=>$user, 'form' => $form->createView(), 
           
        ]);
    }
   
}
