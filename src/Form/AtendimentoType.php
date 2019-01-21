<?php

namespace App\Form;

use App\Entity\Atendimento;
use App\Entity\Funcionario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AtendimentoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('data', DateType::class, array(
                'label' => 'Data Atend.', 
                'required' => false,
                'widget' => 'single_text'
            ))
            ->add('relato', TextareaType::class, array(
                'attr' => array('class' => 'ckeditor'),
            ))
            ->add('tipo', ChoiceType::class, array(
                'label' => 'Necessidade do Atendimento',
                'multiple' => true,
                'choices'  => array(
                    'Fortalecimento de Vínculo Familiar e Comunitário rompido' =>'Fortalecimento de Vínculo Familiar e Comunitário rompido',
                    'Regulamentação de Documentação Civil' =>'Regulamentação de Documentação Civil',
                    'Questões de Mobilidade Urbana' => 'Questões de Mobilidade Urbana',
                    'Acesso a Benefícios Socioassistenciais' => 'Acesso a Benefícios Socioassistenciais',
                    'Acesso a Educação' => 'Acesso a Educação',
                    'Acesso a Programas Habitacionais' => 'Acesso a Programas Habitacionais',
                    'Defesa e Proteção ao Idoso' => 'Defesa e Proteção ao Idoso',
                    'Defesa e Proteção à Pessoa com Deficiência' => 'Defesa e Proteção à Pessoa com Deficiência',
                    'Defesa e Proteção à Mulher' => 'Defesa e Proteção à Mulher',
                    'Defesa e Proteção à Criança/adolesc. em situação Trabalho' => 'Defesa e Proteção à Criança/adolesc. em situação Trabalho',
                    'Defesa e Proteção à Criança/adolesc. Vítima de Violência Física ou Psicológica' => 'Defesa e Proteção à Criança/adolesc. Vítima de Violência Física ou Psicológica',
                    'Defesa e Proteção à Criança/Adolesc. Vítima de Abuso e/ou Exploração Sexual' => 'Defesa e Proteção à Criança/Adolesc. Vítima de Abuso e/ou Exploração Sexual',
                    'Articulação com Serviços de Saúde' => 'Articulação com Serviços de Saúde',
                    'Articulação com a Alta Complexidade' => 'Articulação com a Alta Complexidade',
                    'Articulação com Serviços de Saúde Mental' => 'Articulação com Serviços de Saúde Mental',
                    'Articulação com Centro POP' => 'Articulação com Centro POP',
                    'Articulação com ILPI para Criança e Adolescente' => 'Articulação com ILPI para Criança e Adolescente',
                    'Articulação com Conselho Tutelar' => 'Articulação com Conselho Tutelar',
                    'Articulação com Poder Judiciário' => 'Articulação com Poder Judiciário',
                    'Articulação com Proteção Social Básica' => 'Articulação com Proteção Social Básica',
                    'Criança/adolescente em cumprimento de MSE – LA-PSC' => 'Criança/adolescente em cumprimento de MSE – LA-PSC',
                    'Criança/adolescente em cumprimento de MSE – Internação – Semiliberdade' => 'Criança/adolescente em cumprimento de MSE – Internação – Semiliberdade',
                    'Indivíduo que compõe a núcleo familiar em situação de reclusão' => 'Indivíduo que compõe a núcleo familiar em situação de reclusão'
                )))
            ->add('usuario')
            ->add('funcionario', EntityType::class, [
                'label' => 'Técnico Responsável',
                'class' => Funcionario::class,
                'choice_label' => 'nome',
                'placeholder' => 'Selecione'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Atendimento::class,
        ]);
    }
}
