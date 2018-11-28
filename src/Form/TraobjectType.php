<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\County;
use App\Entity\State;
use App\Entity\Traobject;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TraobjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('state', EntityType::class, [
//                "class" => State::class,
//                "choice_label" => "label"
//            ])
            ->add('title')
            ->add('picture', FileType::class)
            ->add('description')
            ->add('eventAt', DateType::class, ['widget' => 'single_text'])
            ->add('city')
            ->add('address')
            ->add('category', EntityType::class, [
                "class" => Category::class,
                "choice_label" => "label"
            ])
            ->add('county', EntityType::class, [
                "class" => County::class,
                "choice_label" => "label"
            ])
            ->add('user', EntityType::class, [
                "class" => User::class,
                "choice_label" => "firstname"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Traobject::class,
        ]);
    }
}
