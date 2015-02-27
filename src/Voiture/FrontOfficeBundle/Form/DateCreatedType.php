<?php

namespace Voiture\FrontOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DateCreatedType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$now = new \dateTime('now');

		$builder -> add('dateCreated','date', array('label'=>'Triez les annonces par date :',
													'attr' => array('class'       => 'form-control',
																	'placeholder' => 'Sélectionnez la date voulue'),
													'years'=> range(2005, $now -> format('Y'))))											
				 -> add('Valider pour voir les annonces correspondantes','submit',
				 							  array('attr' => array('class'       =>'btn btn-primary',
				 													'style'       =>'margin-top:25px;margin-left:280px;')));
	}

	public function getName()
	{
		return 'voiture_frontofficebundle_datecreated';

	}
}

