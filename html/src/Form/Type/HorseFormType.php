<?php

namespace App\Form\Type;

use App\Entity\Horse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HorseFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Horse name',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('legs', IntegerType::class, [
                'label' => 'Working Legs',
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('alive', CheckboxType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'form-check',
                ]
            ])
            // we don't save the agreeTerms to the Horse entity
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'Agree terms and conditions',
                'required' => true,
                'mapped' => false,
                'attr' => [
                    'class' => 'form-check',
                ]
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Save',
                'attr' => [
                    'class' => 'btn btn-primary',
                ]
            ])
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Horse::class,
        ]);
    }

}