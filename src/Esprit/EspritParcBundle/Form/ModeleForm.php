<?php
/**
 * Created by PhpStorm.
 * User: Dhia
 * Date: 20/10/2018
 * Time: 13:55
 */

namespace Esprit\EspritParcBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModeleForm extends AbstractType
{      public function buildForm(FormBuilderInterface $builder, array $options)
        {
            $builder
                ->add('libelle')
                ->add('Pays')
                ->setMethod('GET')
                ->add('save',SubmitType::class);
        }
        public  function configureOptions(OptionsResolver $resolver)
        {

        }
        public function getName(){
                return'esprit_parc_bundle_modele_form';
        }


}