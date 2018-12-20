<?php

namespace App\Form;

use App\Entity\InternalPartner;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InternalPartnerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('EventCount')
            ->add('partnerIntake')
            ->add('contact')
            ->add('phoneNumber')
            ->add('email')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => InternalPartner::class,
        ]);
    }
}
