<?php

namespace App\Form;

use App\Entity\Users;
use App\Entity\Roles;
use App\Entity\Genders;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class UsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('last_name')
            ->add('first_name')
            ->add('date_of_birth')
            ->add('email')
            ->add('password')
            ->add('registration_date')
            ->add('is_verified')
            ->add('role',EntityType::class,[
                "class" => Roles::class,
                "choice_label" => "name",
                "multiple" => true
            ])
            ->add('gender',EntityType::class,[
                "class" => Genders::class,
                "choice_label" => "name",
                "multiple" => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
