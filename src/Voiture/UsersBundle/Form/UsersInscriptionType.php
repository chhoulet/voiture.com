<?php

namespace Voiture\UsersBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsersInscriptionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder ->add('email', 'text',         array('label' => 'Saisissez votre email :',
                                                      'attr'  =>  array('class'=>'form-control',
                                                                        'placeholder'=>'Entrez votre mot de passe')))
                 ->add('valider', 'submit',     array('attr'=> array('class'=>'btn btn-primary')))
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
        return 'voiture_usersbundle_usersinscription';
    }
}
