<?php

namespace App\Form;

use App\Entity\Saude;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class SaudeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('medicamento')
            ->add('dataInicio' , DateType::class, array(
                'widget' => 'single_text',
                'label' => 'Início do Medicamento',
                // this is actually the default format for single_text
                'format' => 'yyyy-MM-dd',
                'required' => false
            ))
            ->add('periodo', null, array(
                'required'   => false,
                'label' => 'Período em dias',
            ))
            ->add('dosagem')
            ->add('validade', DateType::class, array(
                'widget' => 'single_text',
                'label' => 'Validade',
                // this is actually the default format for single_text
                'format' => 'yyyy-MM-dd',
                'required' => false
            ))
            ->add('doenca', ChoiceType::class, array(
                'label' => 'Possui Doença?',
                'choices'  => array(
                    'Não'  =>0,
                    'Sim' =>1
                )))
            ->add('nomeDoenca', null, array(
                'required'   => false,
                'label' => 'Nome da Doença',
            ))
            ->add('tratamento', ChoiceType::class, array(
                'label' => 'Faz algum tratamento?',
                'choices'  => array(
                    'Não'  =>0,
                    'Sim' =>1
                )))
            ->add('anotacao', TextareaType::class, array(
                'attr' => array('class' => 'ckeditor'),
                'label' => 'Anotações'
            ))
            ->add('usuario')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Saude::class,
        ]);
    }
}
