<?php

namespace App\Form;

use App\Entity\DataTypes;
use App\Entity\Goals;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GoalsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('start_date')
            ->add('end_date')
            ->add('value')
            ->add('_user', EntityType::class, [
                "class" => Users::class,
                "choice_label" => "email"
            ])
            ->add('data_type', EntityType::class, [
                "class" => DataTypes::class,
                "choice_label" => "name"
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Goals::class,
        ]);
    }
}