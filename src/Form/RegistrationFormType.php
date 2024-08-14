<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationFormType extends AbstractType
{
    # Déclaration d'une propriété de class, car
    # la foncion buildForm() ne peut prendre aucune injection de dépendance.
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'eMail',
                'attr' => [
                    'placeholder' => 'Saisissez votre Email',
                    'class' => 'form-control form-control-lg'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un Email',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('firstName', TextType::class, [
                'label' => 'Votre prénom',
                'mapped' => false,
                'required' => true,
                'attr' => [
                    'novalidate' => 'novalidate', // Désactiver la validation HTML5 côté client pour ce champ
                    'placeholder' => 'Saisiez votre prénom ici',
                    'class' => 'form-control form-control-lg'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un prénom',
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Votre prénom doit comporter au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 100,
                    ]),
                ],
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Votre nom',
                'mapped' => false,
                'required' => true,
                'attr' => [
                    'novalidate' => 'novalidate', // Désactiver la validation HTML5 côté client pour ce champ
                    'placeholder' => 'Saisiez votre nom ici',
                    'class' => 'form-control form-control-lg'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un nom',
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Votre nom doit comporter au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 100,
                    ]),
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Acceptation de nos termes et conditions',
                'attr' => [
                    'class' => 'form-check-input'
                ],
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter nos termes et conditions d\'utilisation.',
                    ]),
                ]
            ])
        ;

        # Si c'est un update_user, alors on ne rend pas l'input du password.
        # Ce champ est docn réservé à l'inscription.
        if(! $this->security->getUser()){
            $builder
                ->add('plainPassword', PasswordType::class, [
                    'label' => 'Choisissez un mot de passe',
                    // instead of being set onto the object directly,
                    // this is read and encoded in the controller
                    'mapped' => false,
                    'attr' => [
                        'autocomplete' => 'new-password',
                        'placeholder' => 'Saisiez votre mot de passe ici',
                        'class' => 'form-control form-control-lg'],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Please enter a password',
                        ]),
                        new Length([
                            'min' => 6,
                            'minMessage' => 'Your password should be at least {{ limit }} characters',
                            // max length allowed by Symfony for security reasons
                            'max' => 4096,
                        ]),
                    ],
                ])
            ;
        }

        $builder
            ->add('submit', SubmitType::class, [
                'label' => ! $this->security->getUser() ? "Je m'inscris" : "J'actualise mon compte",
                'validate' => false,
                'attr' => [
                    'class' => 'd-block col-5 my-3 mx-auto btn btn-warning'
                ]
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
