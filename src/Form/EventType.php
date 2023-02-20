<?php

namespace App\Form;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\File;
use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomEvent')
            ->add('description', null, [
                'label' => 'Description',
                'attr' => [
                    'placeholder' => 'Enter a description of the event',
                ],
            ])
            ->add('type', ChoiceType::class, [
                'label' => 'Event Type',
                'choices' => [
                    'Competition' => 'Competition',
                    'E-sports' => 'E-sports',
                ],
                'attr' => [
                    'placeholder' => 'Select the type of the event',
                ],
            ])
            ->add('location', TextType::class, [
                'label' => 'Location',
                'attr' => [
                    'placeholder' => 'Enter the location of the event',
                ],
            ])
            ->add('date', null, [
                'label' => 'Date',
                'widget' => 'single_text',
                'attr' => [
                    'placeholder' => 'Select the date of the event',
                ],
            ])
            
            ->add('type', ChoiceType::class, [
                'label' => 'Event Type',
                'choices' => [
                    'Competition' => 'Competition',
                    'E-sports' => 'E-sports',
                ],
                'attr' => [
                    'placeholder' => 'Select the type of the event',
                ],
            ])
            ->add('image', FileType::class, [
                'label' => 'Event Image',
                'mapped' => false,
                'required' => false,
                'data_class' => null,
                'constraints' => [
                    new File([
                        'mimeTypes' => [
                            'image/gif',
                            'image/jpeg',
                            'image/jpg',
                            'image/png',

                        ],
                        'mimeTypesMessage' => 'please upload an image file' ,

                    ])
                    ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
