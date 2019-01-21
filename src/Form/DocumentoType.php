<?php

namespace App\Form;

use App\Entity\Documento;
use App\Entity\Usuario;
use App\Entity\Secretaria;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class DocumentoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero', null, array(
                'label' => 'Nº Documento',
            ))
            ->add('tipo', ChoiceType::class, array(
                'choices'  => array(
                    'C.I.'  =>'C.I',
                    'Ofício' =>'Ofício',
                    'Relatório' =>'Relatório',
                    'Outros' =>'Outros'
                )))
            ->add('dataEmitido', DateType::class, array(
                'widget' => 'single_text',
                'label' => 'Data Emissão',
                // this is actually the default format for single_text
                'format' => 'yyyy-MM-dd',
                'required' => false
            ))
            ->add('dataRecebido', DateType::class, array(
                'widget' => 'single_text',
                'label' => 'Data Recebido',
                // this is actually the default format for single_text
                'format' => 'yyyy-MM-dd',
                'required' => false
            ))
            ->add('reiteracao', ChoiceType::class, array(
                'label'    => 'Reiteração?',
                'required' => false,
                'choices' => array(
                    'Não' => 0,
                    'Sim' => 1
                )
            ))
            ->add('documentoReiterado', null, array(
                'required'   => false,
                'label' => 'Qual Documento Reiterado?',
            )) 
            ->add('usuario', EntityType::class, [
                'label' => 'Usuário',
                'required' => false,
                'class' => Usuario::class,
                'choice_label' => 'nome',
                'placeholder' => 'Selecione'
                ]) 
            ->add('origem', EntityType::class, array(
                'label' => 'Origem',
                'required' => false,
                'class' => Secretaria::class,
                'choice_label' => 'nome',
                'placeholder' => 'Selecione'
            ))
            ->add('setor')
            ->add('destinatario', EntityType::class, array(
                'label' => 'Destinatário',
                'required' => false,
                'class' => Secretaria::class,
                'choice_label' => 'nome',
                'placeholder' => 'Selecione'
            ))
            ->add('prazo_resposta')
            ->add('respondido', null, [
                'label' => 'Respondido?',
            ])
            ->add('documento_resposta')
            ->add('dataResposta', DateType::class, array(
                'widget' => 'single_text',
                'label' => 'Data da Resposta',
                // this is actually the default format for single_text
                'format' => 'yyyy-MM-dd',
                'required' => false
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Documento::class,
        ]);
    }
}
