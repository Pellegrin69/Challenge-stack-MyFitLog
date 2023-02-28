<?php

namespace App\Form;

use App\Entity\Datas;
use App\Entity\DataTypes;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DatasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date')
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
            'data_class' => Datas::class,
        ]);
    }
}
