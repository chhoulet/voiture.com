<?php

namespace Voiture\FrontOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GaragesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name','text',     array('label'=>'Entrez le nom du garage :',
                                           'attr' => array('class'=>'form-control',
                                                           'placeholder'=>'Nom')))
            ->add('ville', 'text',   array('label'=>'Entrez la ville',
                                           'attr' => array('class'=>'form-control',
                                                           'placeholder'=>'Ville')))
            ->add('adress', 'text',  array('label'=>'Entrez l\'adresse de l\'établissement',
                                           'attr' => array('class'=>'form-control',
                                                           'placeholder'=>'Adresse')))
            ->add('brand', null,     array('label'=>'Quelle est la marque proposée :',
                                           'attr' => array('class'=>'form-control',
                                                           'placeholder'=>'Marque distribuée')))
            ->add('region', null,    array('label'=>'Choisissez votre région :',
                                           'attr' => array('class'=>'form-control',
                                                           'placeholder'=>'')))
            ->add('categorie',null,  array('label'=>'Choisissez la catégorie des voitures vendues :',
                                           'attr' => array('class'=>'form-control',
                                                           'placeholder'=>'catégorie')))
            ->add('Valider','submit',array('attr' => array('class'=>'btn btn-primary',
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
            'data_class' => 'Voiture\FrontOfficeBundle\Entity\Garages'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'voiture_frontofficebundle_garages';
    }
}
