<?php

namespace Voiture\FrontOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class AnnoncesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $now = new \DateTime('now');
        
        $builder
            ->add('username','text',           array('label'=>'Entrez votre nom d\'utilisateur :',
                                                     'attr' => array('class' => 'form-control',
                                                                     'placeholder' => 'Username')))
            ->add('content', 'textarea',       array('label'=>'Entrez le texte de l\'annonce :',
                                                     'attr' => array('class' => 'form-control',
                                                                     'placeholder' => 'Annonce')))
            ->add('brand', null,              array('label'=>'Marque du véhicule :',
                                                     'attr' => array('class' => 'form-control',
                                                                     'placeholder' => 'Marque')))
            ->add('model', 'text',             array('label'=>'Modèle du véhicule :',
                                                     'attr' => array('class' => 'form-control',
                                                                     'placeholder' => 'Modèle')))
            ->add('kilometers', 'text',        array('label'=>'Nombre de kilomètres :',
                                                     'attr' => array('class' => 'form-control',
                                                                     'placeholder' => 'Kilométrage')))  
            ->add('engine', 'text',            array('label'=>'Quelle est le type du moteur ?',
                                                     'attr' => array('class' => 'form-control',
                                                                     'placeholder' => 'Motorisation diesel ou essence'))) 
            ->add('price', 'text',             array('label'=>'Quel est le prix de vente de ce véhicule ? ',
                                                     'attr' => array('class' => 'form-control',
                                                                     'placeholder' => 'Prix')))
            ->add('dateFirstAcquire','date',   array('label'=>'Date de mise en circulation :',
                                                     'attr' => array('class' => 'form-control' ),
                                                     'years'=> range(1950, $now->format('Y'))))                                           
            ->add('categorie', null,           array('label'=> 'Choisissez la catégorie du véhicule :',
                                                     'attr' => array('class' => 'form-control',
                                                                     'placeholder' => 'Marque')))        
            ->add('region', null,              array('label'=>'Quelle est la région de mise en vente :',
                                                     'attr'=> array('class'=>'form-control',
                                                                    'placeholder'=>'Région')))
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
            'data_class' => 'Voiture\FrontOfficeBundle\Entity\Annonces'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'voiture_frontofficebundle_annonces';
    }
}
