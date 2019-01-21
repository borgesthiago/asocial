<?php

namespace App\Form;

use App\Entity\Servico;
use App\Entity\Secretaria;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ServicoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('status',ChoiceType::class, array(
                'choices' => array(
                    'Ativo' => 1,
                    'Inativo' =>0
                )
            ))
            ->add('secretaria', EntityType::class, [
                'class' => Secretaria::class,
                'choice_label' => 'nome',
                'placeholder' => 'Selecione'
                ])    
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Servico::class,
        ]);
    }
}
