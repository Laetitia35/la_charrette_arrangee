<?php

namespace App\Controller\Admin;

use App\Entity\Recipe;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RecipeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Recipe::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        
            ->setEntityLabelInSingular('Une recette')
            ->setEntityLabelInPlural('Les recettes');
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')->setLabel('Nom')->setHelp('Nom de la recette'),
            SlugField::new('slug')->setLabel('URL')->setTargetFieldName('name')->setHelp('Url de votre recette généré automatiquement'),
            TextEditorField::new('ingredient')->setLabel('Ingrédients')->setHelp('Liste des ingredients contenues dans la recette'),
            TextEditorField::new('description')->setLabel('Description de la recette'),
            ImageField::new('illustration')->setLabel('Image')->setUploadedFileNamePattern('[year]-[mounth]-[day]-[contenthash].[extension]')->setBasePath('/uploads')->setUploadDir('public/uploads'),
        ];
    }
    
}
