<?php

namespace Voiture\FrontOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DateFirstAcquireType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$now = new \dateTime('now');

		$builder -> add('DateFirstAcquire','date', array('label'=>'Choisissez la date',
														 'attr' => array('placeholder'=>'00-00-0000',
														 				 'class' => 'form-control'),
														 'years'=> range(1950, $now -> format('Y'))))
				 -> add('Valider pour voir les annonces correspondantes','submit', 
				 								   array('attr' => array('class'=>'btn btn-primary',
				 								   						 'style'=>'margin-top:25px;margin-left:280px;')));
	}

	 public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
        ));
    }

	public function getName()
	{
		return 'voiture_frontofficebundle_datefirstacquire';
	}
}