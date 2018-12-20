<?php

namespace App\Form;

use App\Entity\Satisfaction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SatisfactionType1 extends AbstractType
{
    const SATISFACTION = [
        'Très satisfait' => 'Très satisfait',
        'Satisfait' => 'Satisfait',
        'Peu satisfait' => 'Peu satisfait',
        'Pas satisfait' => 'Pas satisfait',
    ];

    const EXISTANCE = [
        'Presse' => 'Presse',
        'Mail' => 'Mail',
        'Bouche-à-oreille' => 'Bouche-à-oreille',
        'Réseaux sociaux' => 'Réseaux sociaux',
        'Site internet LAB\'O' => 'Site internet LAB\'O',
    ];
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('satisfactionRatio', ChoiceType::class, [
                'choices' => self::SATISFACTION,
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('amelioration', TextType::class)
            ->add('eventElarge', ChoiceType::class, [
                'choices' => ['Oui' => 'Oui', 'Non' => 'Non'],
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('contact')
            ->add('existance', ChoiceType::class, [
                'choices' => self::EXISTANCE,
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('comment', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Satisfaction::class,
        ]);
    }
}
