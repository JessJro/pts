<?php

namespace App\Controller;

use App\Entity\Formation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class FormationController extends AbstractController
{   private $em;

    public function __construct(EntityManagerInterface $em)
    {
       $this->em=$em;
    }

    #[Route('/formation', name: 'formation')]
    public function index(): Response
    {
        $formations= $this->em->getRepository(Formation::class)->findAll();
        
            return $this->render('formation/index.html.twig', [
                'formations' => $formations,
            ]);
    }
}
