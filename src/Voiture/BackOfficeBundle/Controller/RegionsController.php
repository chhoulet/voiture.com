<?php

namespace Voiture\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Voiture\FrontOfficeBundle\Entity\Regions;
use Voiture\FrontOfficeBundle\Form\RegionsType;

class RegionsController extends Controller
{
	public function showRegionsAction()
	{
		$em = $this -> getDoctrine()->getManager();
		$regions = $em -> getRepository('VoitureFrontOfficeBundle:Regions')->findAll();

		return $this -> render('VoitureBackOfficeBundle:Regions:showRegions.html.twig', array('regions'=>$regions));
	}
	
	public function creationRegionAction(Request $request)
	{
		$em = $this -> getDoctrine()-> getManager();
		$region  = new Regions();
		$form = $this -> createForm(new RegionsType, $region);

		$form -> handleRequest($request);

		if($form ->isValid()){
			$em -> persist($region);
			$em -> flush();

			return $this -> redirect($this->generateUrl('voiture_back_office_creationRegions'));
		}

		return $this -> render('VoitureBackOfficeBundle:Regions:creationRegion.html.twig',array('form'=>$form->createView()));
	}

	public function editionRegionAction(Request $request, $id)
	{
		$em = $this -> getDoctrine()->getManager();
		$region = $em -> getRepository('VoitureFrontOfficeBundle:Regions')-> find($id);
		$form = $this -> createForm(new RegionsType, $region);

		$form -> handleRequest($request);

		if($form -> isValid()){
			$em -> persist($region);
			$em -> flush();

			return $this ->redirect($this->generateUrl('voiture_back_office_editionRegions',array('id'=>$id)));
		}

		return $this -> render('VoitureBackOfficeBundle:Regions:editionRegion.html.twig',array('form'=>$form->createView()));
	}

	public function suppRegionAction($id)
	{
		$em = $this ->getDoctrine()->getManager();
		$suppRegion = $em ->getRepository('VoitureFrontOfficeBundle:Regions')->find($id);
		$em -> remove($suppRegion);
		$em -> flush();

		return $this -> redirect($this->generateUrl('voiture_back_office_showRegions'));
	}

}