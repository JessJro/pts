<?php

namespace App\Controller\Admin;

use App\Entity\Formation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FormationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Formation::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextField::new('content1'),
            ImageField::new('image1')
                ->setBasePath('uploads/files')
                ->setUploadDir('public/uploads/files')
                ->setUploadedFileNamePattern('[randomhash]', '[extension]')
                ->setRequired(false)
                ->hideOnIndex()->hideOnIndex(),
            TextField::new('content2'),
            ImageField::new('image2')
                ->setBasePath('uploads/files')
                ->setUploadDir('public/uploads/files')
                ->setUploadedFileNamePattern('[randomhash]', '[extension]')
                ->setRequired(false)
                ->hideOnIndex()->hideOnIndex(),        

        ];
    }
 
}
