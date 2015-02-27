<?php

namespace Voiture\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Voiture\FrontOfficeBundle\Entity\Garages;

class GaragesController extends Controller
{
	public function showGaragesAction()
	{
		$em = $this -> getDoctrine()->getManager();
		$garages = $em -> getRepository('VoitureFrontOfficeBundle:Garages')->findAll();

		return $this -> render('VoitureFrontOfficeBundle:Garages:showGarages.html.twig', array('garages'=>$garages));
	}

	public function showOneGarageAction($id)
	{
		$em = $this -> getDoctrine()-> getManager();
		$oneGarage = $em -> getRepository("VoitureFrontOfficeBundle:Garages")->find($id);

		return $this -> render('VoitureFrontOfficeBundle:Garages:showOneGarage.html.twig', array('oneGarage'=>$oneGarage));
	}
}