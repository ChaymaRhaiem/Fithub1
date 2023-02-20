<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('email')
            ->add('password')
            ->add('role', ChoiceType::class, [
                'label' => 'Choisissez votre role :',
                'choices' => [
                    'Merci de choisir votre role' => null,
                    'Membre' => 'Membre',
                    'Nutrisionniste' => 'Nutrisionniste',
                    'Coach' => 'Coach',
                    'Admin' => 'Admin',
                    
                ],
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('poids')
            ->add('taille')
            ->add('telephone')
            ->add('specialite')
            ->add('experience')
            ->add('adresse')
            ->add('date_de_naissance')
            ->add('genre',ChoiceType::class, [
                'label' => 'Choisissez votre sexe ',
                'choices' => [
                    'Merci de choisir votre sexe' => null,
                    'Homme' => 'Homme',
                    'Femme' => 'Femme',
                    
                    
                ],
                'multiple' => false,
                'expanded' => false,
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
