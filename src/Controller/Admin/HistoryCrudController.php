<?php

namespace App\Controller\Admin;

use App\Entity\History;

use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class HistoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return History::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('title', 'Titre'),
            TextField::new('subtitle', 'Sous-titre'),
            TextEditorField::new('content', 'Contenu'),
            ImageField::new('image')
                ->setBasePath('uploads/files')
                ->setUploadDir('public/uploads/files')
                ->setUploadedFileNamePattern('[randomhash]', '[extension]')
                ->setRequired(false)
                ->hideOnIndex(),
            TextField::new('date', 'Date (Uniquement les 4 chiffres de l\'année)'),
        ];
    }
    
}
