<?php

namespace App\Controller\Admin;

use App\Entity\Blog;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BlogCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Blog::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        
        return [
            
            TextField::new('title', 'Titre'),
            SlugField::new('slug')->setTargetFieldName('title')->hideOnIndex(),
            TextField::new('introduction', 'Intro'),
            TextEditorField::new('content1', 'Contenu'),
            ImageField::new('image1')
                ->setBasePath('uploads/files')
                ->setUploadDir('public/uploads/files')
                ->setUploadedFileNamePattern('[randomhash]', '[extension]')
                ->setRequired(false)
                ->hideOnIndex(),
            DateField::new('created_at'),
            TextEditorField::new('content2', 'Contenu'),
            ImageField::new('image2')
                ->setBasePath('uploads/files')
                ->setUploadDir('public/uploads/files')
                ->setUploadedFileNamePattern('[randomhash]', '[extension]')
                ->setRequired(false)
                ->hideOnIndex(),
        ];
    }
    
}
