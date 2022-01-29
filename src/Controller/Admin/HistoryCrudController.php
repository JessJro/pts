<?php

namespace App\Controller\Admin;

use App\Entity\History;

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
            
            TextField::new('title'),
            TextField::new('subtitle'),
            TextEditorField::new('content'),
            ImageField::new('subtitle'),
        ];
    }
    
}
