<?php

namespace App\Form;

use App\Entity\Usuario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Form\Type\CpfType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('cpf', CpfType::class, [
                'label' => 'CPF',
                'required' => false
            ])            
            ->add('rg', null, array(
                'required'   => false,
                'label' => 'RG',
            ))
            ->add('orgaoRg', null, array(
                'required'   => false,
                'label' => 'Órgão RG',
            ))
            ->add('dataNascimento', DateType::class, array(
                'label' => 'Data Nasc.', 
                'required' => false,
                'widget' => 'single_text'
            ))
            ->add('email')
            ->add('sexo', ChoiceType::class, array(
                'label' => 'Sexo',
                'choices'  => array(
                    'M' =>'M',
                    'F' =>'F'
                )))
            ->add('pcd', ChoiceType::class, array(
                'label' => 'PCD',
                'choices'  => array(
                    'Sim'    =>1,
                    'Não' =>0
                )))
            ->add('naturalidade')
            ->add('profissao', null, array(
                'required'   => false,
                'label' => 'Profissão',
            ))
            ->add('ocupacao', null, array(
                'required'   => false,
                'label' => 'Ocupação',
            ))
            ->add('renda')
            ->add('ctps', null, array(
                'required'   => false,
                'label' => 'CTPS',
            ))
            ->add('serieCtps', null, array(
                'required'   => false,
                'label' => 'Série CTPS',
            ))
            ->add('escolaridade', ChoiceType::class, array(
                'choices'  => array(
                    'Não Informado' =>'Não Informado',
                    'Sem Alfabetização' => 'Sem Alfabetização',
                    'EF Incompleto' =>'EF Incompleto',
                    'EF Completo' =>'EF Completo',
                    'EM Incompleto' =>'EM Completo',
                    'EM Completo' =>'EM Completo',
                    'ES Incompleto' =>'ES Incompleto',
                    'ES Completo' =>'ES Completo'
                )))
            ->add('nis', null, array(
                'required'   => false,
                'label' => 'NIS',
            ))
            ->add('contato', ContatoType::class)
        ;
        $builder->add('habitacao', HabitacaoType::class);        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Usuario::class,
        ]);
    }
}
