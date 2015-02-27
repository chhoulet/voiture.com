<?php

namespace Voiture\FrontOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BrandType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name','text',       array('label'=>'Ajoutez le nom de la marque :',
                                             'attr' => array('class'=>'form-control',
                                                             'placeholder'=>'Marque')))
            ->add('slug','text',       array('label'=>'Ajoutez un slug :',
                                             'attr' => array('class'=>'form-control',
                                                             'placeholder'=>'Slug')))
             ->add('Valider','submit', array('attr'=> array('class'=>'btn btn-primary',
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
            'data_class' => 'Voiture\FrontOfficeBundle\Entity\Brand'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'voiture_frontofficebundle_brand';
    }
}
