<?php

namespace Voiture\FrontOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MessageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username','text',     array('label' => 'Entrez votre nom d\'utilisateur :',
                                               'attr'  =>  array('class'       => 'form-control',
                                                                 'placeholder' => 'username')))
            ->add('sujet', 'text',       array('label' => 'Entrez le sujet du message :',
                                               'attr'  =>  array('class'       =>'form-control',
                                                                 'placeholder' => 'sujet' )))
            ->add('content', 'textarea', array('label' => 'Entrez votre message :', 
                                               'attr'  =>  array('class' => 'form-control',
                                                                 'placeholder' => 'contenu du message')))
            ->add('email', 'text',       array('label' => 'Saisissez votre email :',
                                               'attr'  =>  array('class'       =>'form-control',
                                                                 'placeholder' =>'email')))
            ->add("valider","submit",    array('attr'  =>  array('class' => 'btn btn-primary',
                                                               'style' => 'margin-top:20px')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Voiture\FrontOfficeBundle\Entity\Messages'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'voiture_frontofficebundle_messages';
    }
}
