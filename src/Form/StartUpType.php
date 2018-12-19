<?php

namespace App\Form;

use App\Entity\StartUp;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StartUpType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEntreprise')
            ->add('nomDirigeant')
            ->add('adresse')
            ->add('fondationDate')
            ->add('siretNumber')
            ->add('workerNumber')
            ->add('activity')
            ->add('intellectualProperty')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => StartUp::class,
        ]);
    }
}
