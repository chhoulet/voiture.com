<?php

namespace Voiture\FrontOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class KilometersType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('kilometers','choice',       array('label'  =>'Choisissez le kilométrage :',
                                                     'attr'   => array('class'=>'form-control',
                                                                       'placeholder'=>'Kilometers'),
                                                     'choices'=> array('10000'  => '10 000 km',
                                                                       '50000'  => '50 000 km',
                                                                       '100000' => '100 000 km')))
            
             ->add('Valider pour voir toutes les annonces','submit', 
                                               array('attr'=> array('class'=>'btn btn-primary',
                                                                    'style'=>'margin-top:25px;margin-left:280px;'
                                                           )))
        ;
    }
   
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'voiture_frontofficebundle_kilometers';
    }
}