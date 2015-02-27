<?php

namespace Voiture\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Voiture\FrontOfficeBundle\Entity\Garages;
use Voiture\FrontOfficeBundle\Form\GaragesType;

class GaragesController extends Controller
{
	public function creationGarageAction(Request $request)
	{
		$em = $this-> getDoctrine()->getManager();
		$garage = new Garages();
		$form = $this-> createForm(new GaragesType(),$garage);

		$form -> handleRequest($request); 

		if ($form -> isValid())
		{
			$em -> persist($garage);
			$em -> flush();

			$this -> get('session') ->getFlashBag()->add('succes','Un nouveau garage est ajouté dans la base !');

			return $this -> redirect($this->generateUrl('voiture_back_office_creationGarage'));
		}

		return $this -> render('VoitureBackOfficeBundle:Garages:creationGarage.html.twig', array('form'=>$form->createView()));

	}

	public function editionGarageAction(Request $request, $id)
	{
		$em = $this -> getDoctrine()->getManager();
		$garage = $em -> getRepository('VoitureFrontOfficeBundle:Garages')->find($id);
		$form = $this -> createForm(new GaragesType,$garage);

		$form ->handleRequest($request);

		if ($form -> isValid())
		{
			$em -> persist($garage);
			$em -> flush();

			return $this -> redirect($this->generateUrl('voiture_front_office_garages'));
		}

		return $this -> render('VoitureBackOfficeBundle:Garages:editionGarage.hml.twig',array('form'=>$form->createView()));

	}

	public function suppGarageAction($id)
	{
		$em = $this -> getDoctrine()->getManager();
		$suppGarage = $em -> getRepository('VoitureFrontOfficeBundle:Garages')->find($id);
		$em -> remove($suppGarage);
		$em -> flush();

		return $this -> redirect($this->generateUrl('voiture_front_office_garages'));
	}
}




