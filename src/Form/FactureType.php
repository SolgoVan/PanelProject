<?php

namespace App\Form;

use App\Entity\Facture;
use App\Entity\Society;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FactureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateTimeType::class, [
                'date_label'=>'Starts On'
            ])
            ->add('crediteur', EntityType::class, [
                'class' => Society::class,
                'choice_label' => 'nom',
                'label' => 'Créditeur'
            ])
            ->add('debiteur', EntityType::class, [
                'class' => Society::class,
                'choice_label' => 'nom',
                'label' => 'Débiteur'
            ])
            ->add('montant', IntegerType::class)
            ->add('detail', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Facture::class,
        ]);
    }
}
