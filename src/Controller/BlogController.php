<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Entity\Comments;
use App\Form\CommentsType;
use App\Repository\CommentsRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
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
    public function showArticle($slug, Request $request){

        //Article part:
        $article = $this->em->getRepository(Blog::class)->findOneBySlug(['slug'=>$slug]);
        //if no article, redirection to blog page
        if(!$article){
            return $this->redirectToRoute('blog');
        }

        //Comments part:
        $comment = new Comments;
        //Creation of comment form
        $commentForm = $this->createForm(CommentsType::class, $comment);
        $commentForm->handleRequest($request);

        //Form validation
        if ($commentForm->isSubmitted() && $commentForm->isValid()){
            $comment->setDate(new DateTime());
            $comment->setArticle($article);
            
            //get content of parentid 
            $parentid = $commentForm->get("parentid")->getData();

            //get the comment from the parent comment
            if($parentid != null){
                $parent = $this->em->getRepository(Comments::class)->find($parentid);
            }
            //define of the parent
            $comment->setParent($parent ?? null);

            $this->em->persist($comment);
            $this->em->flush();

            $this->addFlash('success', 'Votre commentaire a bien été envoyé');
            return $this->redirectToRoute('article', ['slug' => $article->getSlug()]);
        }

        return $this->render('blog/article.html.twig', [
            'article' => $article,
            'commentForm' =>$commentForm->createView()

        ]);

    }
}
