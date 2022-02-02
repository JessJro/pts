<?php

namespace App\Controller\Admin;

use App\Entity\Comments;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class CommentsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Comments::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            // ...
            // this will forbid to create or delete entities in the backend
            ->disable(Action::NEW, Action::EDIT)
        ;
    }
  
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('article', 'Article commenté'),
            AssociationField::new('author', 'Auteur du commentaire'),
            TextField::new('content', 'Commentaire'),
            DateField::new('created_at', 'Date et heure d\'envoi')->setFormat('dd/mm/Y HH:mm')->renderAsNativeWidget(),
        ];
    }
    
}
