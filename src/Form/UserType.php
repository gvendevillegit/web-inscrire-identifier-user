<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('roles')
            ->add('password')
            ->add('lastName')
            ->add('firstName')
            ->add('isVerified', ChoiceType::class, [
				'label' => 'label.is_verified',
				'required' => true,
                'expanded' => false,
                'choices' => [
                    'yes' => '1',
                    'no' => '0',
                ],
                'attr' => [
                    'class' => 'form-select js-select2 select2-hidden-accessible',
                    'data-search' => 'off',
                    'tabindex' => '-1',
                    'aria-hidden' => 'true',
                ],
            ])
            ->add('status', ChoiceType::class, [
                'attr' => [
                    'class' => 'form-select js-select2 select2-hidden-accessible',
                    'data-search' => 'off',
                ],
                'choices' => [
                    'active' => 'active',
                    'inactive' => 'inactive',
                    'banned' => 'banned',
                    'suspended' => 'suspended',
                ],
            ])
            ->add('createdAt', null, [
                'widget' => 'single_text',
            ])
            ->add('updatedAt', null, [
                'widget' => 'single_text',
            ])
            ->add('deletedAt', null, [
                'widget' => 'single_text',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
