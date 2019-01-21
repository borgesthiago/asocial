<?php

namespace App\Form;

use App\Entity\Beneficios;
use App\Entity\Usuario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BeneficiosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('transfereRenda', ChoiceType::class, array(
                'choices' => array(
                    'Sim' => 1,
                    'Não' => 0
                ),
                'label' => 'Transfere Renda ?',
                'required' => false
            ))
            ->add('programa')
            ->add('bpc', ChoiceType::class, array(
                'choices' => array(
                    'Sim' => 1,
                    'Não' => 0
                ),
                'label' => 'Recebe BPC ?',
                'required' => false
            ))
            ->add('tipoBpc', null, array(
                'label' => 'Tipo BPC',
            ))
            ->add('usuario', EntityType::class, [
                'class' => Usuario::class,
                'choice_label' => 'nome',
                'placeholder' => 'Selecione'
                ])  
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Beneficios::class,
        ]);
    }
}
