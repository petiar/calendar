<?php

namespace App\Form;

use App\Entity\EventParticipant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventParticipantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name',TextType::class)
            ->add('Email', EmailType::class)
            ->add('PhoneNumber',TextType::class)
            ->add('IsSpeaker',ChoiceType::class, array(
                'choices' => array('Yes' => true, 'No' => false)))
            ->add('DatesAttending', ChoiceType::class, array(
                'choices' => $options['dates']
            ))
            ->add('save', SubmitType::class, array('label' => 'Subscribe'))
            ->getForm()
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class
            // 'data_class' => EventParticipant::class,
        ]);
    }
}
