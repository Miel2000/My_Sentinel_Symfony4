<?php

namespace App\Form;

use App\Entity\Diplome;
use App\Entity\Collaborateur;
use App\Entity\RSituationFamilliale;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

class EditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          
            ->add('dateNaissance', BirthdayType::class,[
                'format' => 'dd MM yyyy'
            ])
            ->add('adresse', TextType::class)
            ->add('telephoneMobile', TelType::class)
            ->add('nombreEnfant')
            ->add('numCarteVital',TextType::class)
            ->add('numCartePro',TextType::class)
            ->add('dateContratDebut')
            ->add('dateContratFin')
            ->add('siteAffectation')
            ->add('salaireMensuelBrut')
            ->add('dateDpae')
            ->add('matricule')
            ->add('motifSortie')
            ->add('idAvantages')
            ->add('idCoeficients')
            ->add('idContrats')
            ->add('idDiplomes', EntityType::class, [
                'label' => 'Situation',
                'class' => Diplome::class, 
                'choice_label' => 'libelle',
                'empty_data' => null
            ])
            ->add('idContratDuree')
            ->add('idEchelons')
            ->add('idNiveaux')
            ->add('idPostes')
            ->add('idSecteurs')
            ->add('idSituations', EntityType::class, [
                'label' => 'Situation',
                'class' => RSituationFamilliale::class, 
                'choice_label' => 'libelle',
                'empty_data' => null
            ])
            ->add('idSocietes')
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'btn btn-success']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Collaborateur::class,
        ]);
    }
}
