<?php

namespace App\Form;

use App\Entity\MedicalFile;
use Doctrine\DBAL\Types\BooleanType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MedicalFileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label'=>'Nom :'
            ])
            ->add('prenom', TextType::class, [
                'label'=>'Prénom :'
            ])
            ->add('motif', TextType::class, [
                'label'=>'Motif :'
            ])
            ->add('examen', TextareaType::class,[
                'label'=>'Examen effectué :'
            ])
            ->add('soin', TextareaType::class,[
                'label'=>'Soin réalisé :'
            ])
            ->add('doc', TextType::class, [
                'label'=>'Praticien :'
            ])
            ->add('annexe', TextareaType::class, [
                'label'=>'Commentaire :'])
            ->add('date', DateTimeType::class,[
                'date_label'=>'Starts On'
            ])
            ->add('montant', ChoiceType::class, [
                'label'=>'Montant :',
                'choices'=>[
                    'Soin 1'=>'500',
                    'Soin 2'=>'1000',
                    'Soin 3'=>'1500',
                    'Soin 4'=>'2000',
                    'Soin 5'=>'3000',
                    'Soin 6'=>'5000'
                ]
            ])
            ->add('facture')

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MedicalFile::class,
        ]);
    }
}
