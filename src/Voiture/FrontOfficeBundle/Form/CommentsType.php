<?php

namespace Voiture\FrontOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommentsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username','text',   array('label'=>'Ajoutez votre nom d\'utilisateur :',
                                             'attr' => array('class'=>'form-control',
                                                             'placeholder'=>'Username')))
            ->add('theme', 'text',     array('label'=>'Ajoutez le thème :',
                                             'attr' => array('class'=>'form-control',
                                                             'placeholder'=>'Sujet')))
            ->add('content','textarea',array('label'=>'Ajoutez votre commentaire :',
                                             'attr' => array('class'=>'form-control',
                                                             'placeholder'=>'Commentaire')))
            ->add('Valider','submit',  array('attr' => array('class'=>'btn btn-primary',
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
            'data_class' => 'Voiture\FrontOfficeBundle\Entity\Comments'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'voiture_frontofficebundle_comments';
    }
}
