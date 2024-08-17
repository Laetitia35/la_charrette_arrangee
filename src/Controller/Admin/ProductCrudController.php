<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        
            ->setEntityLabelInSingular('un produit')
            ->setEntityLabelInPlural('Les produits');
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')->setLabel('Nom')->setHelp('Nom de votre produit'),
            SlugField::new('slug')->setLabel('URL')->setTargetFieldName('name')->setHelp('Url de votre produit généré automatiquement'),
            TextEditorField::new('ingredient')->setLabel('Ingrédients')->setHelp('Liste des ingredients contenues dans le produit'),
            TextEditorField::new('description')->setLabel('Description du produit vendu'),
            ImageField::new('illustration')->setLabel('Image')->setUploadedFileNamePattern('[year]-[mounth]-[day]-[contenthash].[extension]')->setBasePath('/uploads')->setUploadDir('public/uploads'),
            NumberField::new('degree')->setLabel('Degré')->setHelp("Pourcentage du volume d'alcool"),
            NumberField::new('capacity')->setLabel('Capacité')->setHelp('Capacité du contenant en Litre'),
            NumberField::new('price')->setLabel('Prix H.T')->setHelp('Prix H.T du produit sans le sigle €.'),
            ChoiceField::new('tva')->setLabel('Taux de TVA')->setChoices([
                '5,5%' => '5.5',
                '10%' => '10',
                '20%' => '20',
        ]),
            AssociationField::new('category')->setLabel('Catégorie')->setHelp('Catégorie à associé au produit'),
        ];
    }
    
}
