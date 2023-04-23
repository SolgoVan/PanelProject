<?php

namespace App\Form;

use App\Entity\Health;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class HealthType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('taille', TextType::class, [
                'attr'=>['placeholder'=> 'en cm']
            ])
            ->add('poids', TextType::class, [
                'attr'=>['placeholder'=> 'en kg']
            ])
            ->add('tabac', ChoiceType::class, [
                'choices'=>[
                    'Jamais'=>'jamais',
                    'Occasionnel'=>'occasionnel',
                    'Souvent'=>'souvent',
                    'Addict'=>'addict'
                ]
            ])
            ->add('alcool', ChoiceType::class, [
                'choices'=>[
                    'Jamais'=>'jamais',
                    'Occasionnel'=>'occasionnel',
                    'Souvent'=>'souvent',
                    'Addict'=>'addict'
                ]
            ])
            ->add('drogue', ChoiceType::class, [
                'choices'=>[
                    'Jamais'=>'jamais',
                    'Occasionnel'=>'occasionnel',
                    'Souvent'=>'souvent',
                    'Addict'=>'addict'
                ]
            ])
            ->add('allergie')
            ->add('comment_allergie', TextType::class, [
                    'label'=>false,
                    'required'=>false,
                    'attr'=>[
                        'placeholder'=>'Si oui'
                    ]
            ])
            ->add('diabete')
            ->add('comment_diabete', TextType::class, [
                'label'=>false,
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'Si oui'
                ]
            ])
            ->add('asthme')
            ->add('comment_asthme', TextType::class, [
                'label'=>false,
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'Si oui'
                ]
            ])
            ->add('cardiaque')
            ->add('comment_cardiaque', TextType::class, [
                'label'=>false,
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'Si oui'
                ]
            ])
            ->add('epilepsie')
            ->add('comment_epilepsie', TextType::class, [
                'label'=>false,
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'Si oui'
                ]
            ])
            ->add('antecedent')
            ->add('comment_boolean', TextType::class, [
                'label'=>false,
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'Si oui'
                ]
            ])
            ->add('traitement')
            ->add('comment_traitement', TextType::class, [
                'label'=>false,
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'Si oui'
                ]
            ])
            ->add('groupe_sanguin', ChoiceType::class, [
                'label'=>false,
                'choices'=>[
                    'A+'=>'A+',
                    'A-'=>'A-',
                    'B+'=>'B+',
                    'B-'=>'B-',
                    'O+'=>'O+',
                    'O-'=>'O-',
                    'AB+'=>'AB+',
                    'AB-'=>'AB-'
                ]
            ])

            ->add('urg_nom', TextType::class,[
                'label'=>false,
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'Nom'
                ]
            ])
            ->add('urg_prenom', TextType::class, [
                'label'=>false,
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'Prénom'
                ]
            ])
            ->add('urg_telephone', TextType::class, [
                'label'=>false,
                'required'=>false,
                    'attr'=>[
                        'placeholder'=>' Numéro de téléphone'
                    ]
            ])
            ->add('comment_urg', TextType::class, [
                'label'=>false,
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'Détail'
                ]
            ])
            ->add('post_it', TextType::class, [
                'label'=>false,
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'Commentaire'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Health::class,
        ]);
    }
}
