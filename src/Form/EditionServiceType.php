<?php

namespace App\Form;

use App\Entity\EditionService;
use App\Entity\Service;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditionServiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $currentDate = new \DateTime();
        $builder
//            ->add('service', EntityType::class,[
//                'class'=>Service::class,
//                'choice_label'=>'title'])
            ->add('date', DateTimeType::class, array(
            'data' => $currentDate,
        ))
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EditionService::class,
        ]);
    }
}
