<?php

namespace Voiture\FrontOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegionsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null,         array('label'=>'Entrez le nom :',
                                              'attr' => array('class'=>'form-control',
                                                              'placeholder'=>'Nom')))
            ->add('slug', 'text',       array('label'=>'Entrez un slug',
                                              'attr' => array('class'=>'form-control',
                                                              'placeholder'=>'Slug')))
            ->add('zipcode', 'integer', array('label'=>'Entrez le code postal',
                                              'attr' => array('class'=>'form-control',
                                                              'placeholder'=>'Code postal')))
            ->add('Valider','submit',   array('attr' => array('class'=>'btn btn-primary',
                                                             'style'=>'margin-top:25px;margin-left:380px;'
                                                           )))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Voiture\FrontOfficeBundle\Entity\Regions'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'voiture_frontofficebundle_regions';
    }
}
