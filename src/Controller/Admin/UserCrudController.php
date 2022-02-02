<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    // Choose what to return in the users list array
    public function configureFields(string $pageName): iterable
    {
        return [
            //IntegerField::new('id'),
            TextField::new('email'),
            TextField::new('pseudo'),
            ArrayField::new('roles'),
        ];
    }
    
}
