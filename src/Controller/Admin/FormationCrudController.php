<?php

namespace App\Controller\Admin;

use App\Entity\Formation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class FormationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Formation::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
               
            TextField::new('title'),
            TextEditorField::new('content1'),
            ImageField::new('image1')
                ->setBasePath('uploads/files')
                ->setUploadDir('public/uploads/files')
                ->setUploadedFileNamePattern('[randomhash]', '[extension]')
                ->setRequired(false)
                ->hideOnIndex(),
            TextEditorField::new('content2'),
            ImageField::new('image2')
                ->setBasePath('uploads/files')
                ->setUploadDir('public/uploads/files')
                ->setUploadedFileNamePattern('[randomhash]', '[extension]')
                ->setRequired(false)
                ->hideOnIndex(),       

        ];
    }
 
}
