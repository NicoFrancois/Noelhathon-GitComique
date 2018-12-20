<?php

namespace App\Form;

use App\Entity\StartUp;
use App\Entity\Service;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
            ->add('email')
            ->add('phoneNumber')
            ->add('fondationDate')
            ->add('siretNumber')
            ->add('workerNumber')
            ->add('activity')
            ->add('intellectualProperty')
            ->add('service', EntityType::class, [
                'class' => Service::class,
                'choice_label' => 'title',
                'multiple' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => StartUp::class,
        ]);
    }
}
