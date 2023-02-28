<?php

namespace App\Form;

use App\Entity\Categories;
use App\Entity\DataTypes;
use App\Entity\Units;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DataTypesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('category',EntityType::class,[
                "class" => Categories::class,
                "choice_label" => "name"
            ])
            ->add('unit',EntityType::class,[
                "class" => Units::class,
                "choice_label" => "name",
                "multiple" => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DataTypes::class,
        ]);
    }
}


