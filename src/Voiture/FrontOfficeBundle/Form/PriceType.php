<?php

namespace Voiture\FrontOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PriceType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder ->add('price','choice', array('label'   =>'Entrez votre prix',
											   'attr'    => array('class'=>'form-control',
											  				      'placeholder' => 'Entrez 5 ou 6 chiffres'),
								   			   'choices' => array('10000'=> '10 000 €',
															 	  '20000'=> '20 000 €',
													     		  '40000'=> '40 000 €',
															 	  '80000'=> '80 000 €')))
				 ->add('Valider pour voir les annonces correspondantes', 'submit', 
				 					   array('attr' => array('class'=>'btn btn-primary',	
				 										     'style'=>'margin-top:25px;margin-left:280px;')));	
	}

	public function getName()
	{
		return 'voiture_frontofficebundle_price';
	}
}

 