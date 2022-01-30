<?php

namespace App\Controller;

use App\Entity\Blog;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class BlogController extends AbstractController
{    private $em;

    public function __construct(EntityManagerInterface $em)
    {
       $this->em=$em;
    }
    #[Route('/blog', name: 'blog')]
    public function index(): Response
    {   $articles = $this->em->getRepository(Blog::class)->findAll();
        
           
        return $this->render('blog/index.html.twig', [
            'articles' => $articles,
        ]);
    }
    #[Route('/blog/{slug}', name: 'article')]
    public function showArticle($slug){
        $article = $this->em->getRepository(Blog::class)->findOneBySlug($slug);

        if(!$article){
            return $this->redirectToRoute('blog');
        }

        return $this->render('blog/article.html.twig', [
            'article' => $article,
        ]);

    }
}
