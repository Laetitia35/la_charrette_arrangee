<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Category::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        
            ->setEntityLabelInSingular('Une catégorie')
            ->setEntityLabelInPlural('Les catégories');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')->setLabel('Titre')->setHelp('Titre de la catégorie'),
            SlugField::new('slug')->setLabel('URL')->setTargetFieldName('name')->setHelp('Url de votre catégorie généré automatiquement')
        ];
    }
}
