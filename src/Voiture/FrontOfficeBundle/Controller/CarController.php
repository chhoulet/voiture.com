<?php

namespace Voiture\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Voiture\FrontOfficeBundle\Entity\Car;

class CarController extends Controller
{
	public function showCarsAction()
	{
		$em = $this -> getDoctrine()->getManager();
		$showCars = $em -> getRepository('VoitureFrontOfficeBundle:Car')->findAll();

		return $this -> render('VoitureFrontOfficeBundle:Car:showCars.html.twig',
			array('showCars'=>$showCars));
	}

	public function oneCarAction($id)
	{
		$em = $this -> getDoctrine()->getManager();
		$oneCar = $em ->getRepository('VoitureFrontOfficeBundle:Car')->find($id);

		return $this -> render('VoitureFrontOfficeBundle:Car:oneCar.html.twig', array('oneCar'=>$oneCar));
	}

	public function createCarAction(Request $request)
	{
		$em = $this -> getDoctrine()->getManager();
		$car = $this -> createForm(new CarType);
		$form -> handleRequest($request);

		if ($form -> isValid()){
			$em -> persist($car);
			$em -> flush();

			return $this -> redirect($this->generateUrl('voiture_front_office_showCar'));
		}

		return $this -> render('VoitureFrontOfficeBundle:Car:createCar.html.twig',array('form'=>$form->createView()));
	}
}