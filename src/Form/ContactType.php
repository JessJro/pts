<?php

namespace App\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class, [
                'label' => 'Nom*',
            ])
            ->add('email', EmailType::class, [
                'required' => true,
                'label' => 'Votre email*',
            ])
            ->add('subject', TextType::class, [
                'label' => 'Sujet',
             ])
            ->add('message',TextareaType::class, [
                'required' => true,
                'label' => 'Votre message*',
                'constraints' => new Length(
                    [
                        'min' => 8,
                        'max' => 200, //limit the number of caracters
                    ]
                ),
                
            ])
            ->add('rgpd', CheckboxType::class,[
                'required' => true,
                'label' => 'En cochant cette case, j\'accepte que les informations saisies soient stockées et utilisées pour permettre de me recontacter. '
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => [
                    'class' => 'btn-card',
            
                ]
            ]);
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }


                      
}
