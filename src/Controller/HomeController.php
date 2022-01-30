<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Formation;
use App\Form\ContactType;
use App\Repository\PresentationRepository;
use App\Entity\Presentation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController
{   private $em;

    public function __construct(EntityManagerInterface $em)
    {
       $this->em=$em;
    }

    #[Route('/', name: 'home')]
    public function index(Request $request): Response
    {
        $presentation = $this->em->getRepository(Presentation::class)->findAll();
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request); 

        if ($form->isSubmitted() && $form->isValid()){
            $contact = $form->getData();
            $this->em->persist($contact);
            $this->em->flush();
        }

        return $this->render('home/index.html.twig', ['presentation'=>$presentation, 'form'=>$form->createView()]);
    }
}
