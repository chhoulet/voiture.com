<?php

namespace Voiture\UsersBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsersType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('_username', 'text',     array('label' => ' Saisissez votre nom d\'utilisateur',
                                                 'attr'  =>   array('class'=>'form-control',
                                                                    'placeholder'=>'Entrez votre nom d\'utilisateur')))
            ->add('_password', 'password', array('label' => 'Saisissez votre mot de passe :',
                                                 'attr'  =>  array('class'=>'form-control',
                                                                   'placeholder'=>'Entrez votre mot de passe')))
            ->add('valider', 'submit', array('attr'=> array('class'=>'btn btn-primary')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'intention' => 'authenticate'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return '';
    }
}
