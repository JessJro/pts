<?php

namespace App\Controller\Admin;

use App\Entity\Presentation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class PresentationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Presentation::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title1'),
            TextEditorField::new('content1'),
            TextField::new('title2'),
            TextEditorField::new('content2'),
            TextField::new('headline1'),
            TextField::new('headline2'),
            ImageField::new('image1'),
            ImageField::new('image2'),
            ImageField::new('image3'),
            ImageField::new('image3'),

        ];
    }
    
}
