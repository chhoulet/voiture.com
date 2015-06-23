<?php

namespace Voiture\FrontOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategoriesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name','text',        array('label'=>'Ajoutez une catégorie :',
                                              'attr' => array('class'=>'form-control',
                                                              'placeholder'=>'Catégorie')))
            ->add('slug','text',        array('label'=>'',
                                              'attr' => array('class'=>'form-control',
                                                             'placeholder'=>'Slug')))
           
            ->add('Valider','submit',   array('attr'=> array('class'=>'btn btn-primary',
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
            'data_class' => 'Voiture\FrontOfficeBundle\Entity\Categories'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'voiture_frontofficebundle_categories';
    }
}
