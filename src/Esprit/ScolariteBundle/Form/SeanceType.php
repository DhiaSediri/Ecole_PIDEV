<?php

namespace Esprit\ScolariteBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SeanceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('classe', EntityType::class, array(
                    'class'=>'EspritScolariteBundle:Classe','choice_label'=>'nom','multiple'=>false,))
                ->add('matiere', EntityType::class, array(
                    'class'=>'EspritScolariteBundle:Matiere','choice_label'=>'nom','multiple'=>false,))
                ->add('salle', EntityType::class, array(
                    'class'=>'EspritScolariteBundle:Salle','choice_label'=>'nom','multiple'=>false,))
                ->add('prof', EntityType::class, array(
                    'class'=>'EspritScolariteBundle:Prof','choice_label'=>'nom','multiple'=>false,))
                ->add('horaire', EntityType::class, array(
                    'class'=>'EspritScolariteBundle:Horaire','choice_label'=>'nom','multiple'=>false,))
                ->add('jour', EntityType::class, array(
                    'class'=>'EspritScolariteBundle:Jour','choice_label'=>'nom','multiple'=>false,));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Esprit\ScolariteBundle\Entity\Seance'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'esprit_scolaritebundle_seance';
    }


}
