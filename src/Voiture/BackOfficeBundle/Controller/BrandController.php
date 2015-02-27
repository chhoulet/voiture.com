<?php

namespace Voiture\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Voiture\FrontOfficeBundle\Entity\Brand;
use Voiture\FrontOfficeBundle\Form\BrandType;
use \DateTime;

class BrandController extends Controller
{
	public function showBrandAction()
	{
		$em = $this -> getDoctrine()->getManager();
		$showBrand = $em -> getRepository('VoitureFrontOfficeBundle:Brand')->findAll();

		return $this -> render('VoitureBackOfficeBundle:Brand:showBrand.html.twig',array('showBrand'=>$showBrand));
	}
	public function creationBrandAction(Request $request)
	{
		$em = $this -> getDoctrine()->getManager();
		$brand = new Brand();
		$form = $this -> createForm(new BrandType(), $brand);

		$form -> handleRequest($request);

		if ($form -> isValid()){
			$em -> persist($brand);
			$em -> flush();

		$this -> get('session')->getFlashBag()->add('succes','Vous avez bien créée une nouvelle marque !');

		return $this -> redirect($this -> generateUrl('voiture_back_office_creationBrand'));
		}

		return $this ->render('VoitureBackOfficeBundle:Brand:creationBrand.html.twig', array('form'=>$form->createView())) ;
	}

	public function editionBrandAction(Request $request,$id)
	{
		$em = $this -> getDoctrine()-> getManager();
		$editBrand = $em ->getRepository('VoitureFrontOfficeBundle:Brand')->find($id);
		$form = $this ->createForm(new BrandType(),$editBrand);

		$form -> handleRequest($request);

		if ($form -> isValid()){
			$editBrand -> setUpDated(new DateTime('now'));
			$em -> persist($editBrand);
			$em -> flush();

		return $this -> redirect($this -> generateUrl('voiture_back_office_showBrand'));
		}

		return $this -> render('VoitureBackOfficeBundle:Brand:editionBrand.html.twig', array('form'=>$form->createView()));
	}

	public function suppBrandAction($id)
	{
		$em = $this -> getDoctrine() -> getManager();
		$suppBrand = $em -> getRepository('VoitureFrontOfficeBundle:Brand')->find($id);
		$em -> remove($suppBrand);
		$em -> flush();

		return $this ->redirect($this->generateUrl('voiture_back_office_showBrand'));

	}
}