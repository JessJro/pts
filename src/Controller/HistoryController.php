<?php

namespace App\Controller;

use App\Entity\History;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class HistoryController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
       $this->em=$em;
    }

    #[Route('/histoire', name: 'history')]
    public function index(): Response
    {
         $histories= $this->em->getRepository(History::class)->findAll();
        
            return $this->render('history/index.html.twig', [
                'histories' => $histories,
            ]);
    }
}
