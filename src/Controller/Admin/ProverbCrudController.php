<?php

namespace App\Controller\Admin;

use App\Entity\Proverb;
use App\Util\VichImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProverbCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Proverb::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnIndex()->hideOnForm(),
            TextField::new('name'),
            SlugField::new('slug')->setTargetFieldName('name'),
            TextEditorField::new('meta_description'),
            TextEditorField::new('explanation'),
            TextEditorField::new('history'),
            TextEditorField::new('example'),
            VichImageField::new('coverFile')
        ];
    }
}
