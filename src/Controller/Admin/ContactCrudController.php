<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;

class ContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contact::class;
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
            EmailField::new('email', 'Adresse email de l\'auteur'),
            DateField::new('created_at', 'Date et heure d\'envoi')->setFormat('dd/mm/Y HH:mm')->renderAsNativeWidget(),
            TextField::new('subject', 'Objet du message'),
            TextareaField::new('message', 'Message'),
            IntegerField::new('rgpd', 'Accord au rgpd (case cochée=1)'),
           
        ];
    }
   
}
