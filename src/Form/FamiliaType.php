<?php

namespace App\Form;

use App\Entity\Familia;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class FamiliaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('dataNascimento', DateType::class, array(
                'widget' => 'single_text',
                'label' => 'Data de Nascimento',
                // this is actually the default format for single_text
                'format' => 'yyyy-MM-dd',
                'required' => false
            ))
            ->add('grauParentesco', ChoiceType::class, array(
                'choices'  => array(
                    'Pai'           =>'Pai',
                    'Mãe'           =>'Mãe',
                    'Filho(a)'      =>'Filho(a)',
                    'Cônjuge'       =>'Cônjuge',
                    'Enteado(a)'    =>'Enteado(a)',
                    'Outros'        =>'Outros',
                ),
                'required'   => false,
                'label' => 'Grau de Parentesco',
            ))
            ->add('profissao', null, array(
                'label' => 'Profissão',
                'required' => false,
            ))
            ->add('ocupacao', null, array(
                'label' => 'Ocupação',
                'required' => false,
            ))
            ->add('renda', null, array(
                'label' => 'Renda RS',
                'required' => false,
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
            ->add('fatorRisco', ChoiceType::class, array(                
                'choices' => array(
                    'Não Informado' => 'Não Informado',
                    'Alcoolismo' => 'Alcoolismo',
                    'Desemprego' => 'Desemprego',
                    'Deficiência' => 'Deficiência',
                    'Drogadição' => 'Drogadição',
                    'HIV+' => 'HIV+',
                    'Saúde Mental' => 'Saúde Mental',
                    'Situação de Rua' => 'Situação de Rua',
                    'Trabalho Infantil' => 'Trabalho Infantil',
                    'Violência Doméstica' => 'Violência Doméstica',
                    'Reclusão' => 'Reclusão',
                    'Cumprimento de MSE' => 'Cumprimento de MSE'
                ),
                'label' => 'Fator de Risco',
                'required' => false,
            ))
            ->add('usuario', null, array(
                'label' => 'Usuário',
                'required' => false,
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Familia::class,
        ]);
    }
}
