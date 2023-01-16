<?php

namespace App\Form;

use App\Entity\EquipementExt;
use App\Entity\EquipementInt;
use App\Entity\Gite;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('surface')
            ->add('nbrRoom')
            ->add('nbrBed')
            ->add('isAnimalAllowed')
            ->add('animalPrice')
            ->add('description')
            ->add('contact')
            ->add('equipementExts', EntityType::class, [
                'class' => EquipementExt::class,
                'expanded' => true,
                'multiple' => true
            ])
            ->add('EquipementInts', EntityType::class, [
                'class' => EquipementInt::class,
                'expanded' => true,
                'multiple' => true
            ])

            ->add('giteServices', CollectionType::class, [
                'entry_type' => GiteServiceType::class,
                'allow_add' => true,
                'allow_delete' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Gite::class,
        ]);
    }
}
