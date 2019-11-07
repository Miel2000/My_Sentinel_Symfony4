<?php

namespace App\Form;

use App\Entity\RPays;
use App\Entity\RSexe;


use App\Form\SexeType;
use App\Entity\Address;
use App\Entity\RVilles;
use App\Entity\RDepartement;
use App\Entity\Collaborateur;
use App\Repository\RPaysRepository;
use App\Repository\RSexeRepository;


use App\Entity\RSituationFamilliale;
use App\Form\Type\PostalAddressType;
use Symfony\Component\Form\AbstractType;
use App\Repository\RDepartementRepository;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Repository\RSituationFamillialeRepository;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class RegistrationType extends AbstractType
{
        // Création d'un formulaire d'inscription

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
            $builder
             ->add('nom', TextType::class, [
                'label' => 'Nom',
                 'attr' => [
                'placeholder' => 'Dupont'
                ]
             ])
            ->add('prenom', TextType::class, [
                'label' => 'Prenom',
                    'attr' => [
                    'placeholder' => 'Christophe'
                    ]
             ])
            ->add('email', EmailType::class, [
                'label' => 'Adresse Email',
                    'attr' => [
                    'placeholder' => 'c.dupont@gmail.com'
                ]
             ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe',
                    'attr' => [
                        'placeholder' => 'Votre mot de passe'
                    ]
             ])
            ->add('confirm_password', PasswordType::class, [
                'label' => 'Confirmez votre mot de passe',
                    'attr' => [
                            'placeholder' => 'Confirmez votre mot de passe'
                        ]
                ])
            ->add('idsexe', EntityType::class, [
                'label' => 'Genre',
                'class' => RSexe::class, 
                'choice_label' => 'libelle',
                'empty_data' => null
            ])
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'btn btn-success'
                ]
            ]);
        
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Collaborateur::class,
        ]);
    }
}
