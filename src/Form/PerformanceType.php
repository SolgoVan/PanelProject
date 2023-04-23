<?php

namespace App\Form;

use App\Entity\Performance;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PerformanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('armure', IntegerType::class)
            ->add('frein', IntegerType::class)
            ->add('moteur', IntegerType::class)
            ->add('suspension', IntegerType::class)
            ->add('transmission', IntegerType::class)
            ->add('turbo', IntegerType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Performance::class,
        ]);
    }
}
