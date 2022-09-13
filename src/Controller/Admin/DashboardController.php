<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Formation;
use App\Entity\Presentation;
use App\Entity\Blog;
use App\Entity\Contact;
use App\Entity\Comments;
use App\Controller\Admin\UserCrudController;
use App\Controller\Admin\FormationCrudController;
use App\Controller\Admin\PresentationCrudController;
use App\Controller\Admin\HistoryCrudController;
use App\Controller\BlogController;
use App\Entity\History;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();
        return $this->render('admin/dashboard.html.twig');
    
    
        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
         return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Police Technique et Scientifique: de A à Z');
    }

    // Side-menu in dashboard
    public function configureMenuItems(): iterable
    {  
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Présentation', 'fas fa-star', Presentation::class);
        yield MenuItem::linkToCrud('Histoire', 'fas fa-history', History::class);
        yield MenuItem::linkToCrud('Blog', 'fas fa-newspaper', Blog::class);
        yield MenuItem::linkToCrud('Commentaires articles','fa fa-commenting', Comments::class);
        yield MenuItem::linkToCrud('Contact', 'fa fa-envelope', Contact::class);
        
        
        
    }
}
