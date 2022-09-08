<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
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
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pseudo', TextType::class, [
                'label' => 'Pseudo*',
                'required' => true,
                'attr'=> [
                    'class'=>'form-control'

                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email*',
                'required' => true,
                'attr'=> [
                    'class'=>'form-control'

                ],
            ])
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'required'=> true,
                'mapped' => false,
                'first_options' => [
                    'label' => 'Votre mot de passe'
                    
            ],
                'second_options' => [
                    'label' => 'Confirmer le mot de passe',
                ],
                'invalid_message' => 'Les mots de passe doivent correspondre.',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez un mot de passe',
                    ]),
                    new Length([
                        'min' => 8,
                        'max' => 20,
                        'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères.',
                        'maxMessage' => 'Votre mot de passe doit contenir au maximum {{ limit }} caractères.'
                    ])
                ]
            ))

            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'label' => "En cochant cette case, j'accepte que les informations saisies soient stockées et utilisées pour permettre de me recontacter.",
                'attr'=>[
                    'class'=>'checkbox mb-3',
                ],
                'constraints' => [
                    new IsTrue([
                        'message' => 'Confirmez être en accord avec nos conditions',
                    ])
                ],
            ])  

            ->add('submit', SubmitType::class, [
                'label' => "S'inscrire",
                'attr'=>[
                    'class'=> 'btn-card',
                ],
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