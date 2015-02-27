<?php
namespace Voiture\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LayoutController extends Controller
{
	public function regionsAction()
	{
		$em = $this -> getDoctrine()->getManager();
		$regions = $em -> getRepository('VoitureFrontOfficeBundle:Regions') -> findAll();

		return $this ->render('VoitureFrontOfficeBundle:Layout:regions.html.twig', array('regions' => $regions));
	}

	public function categoriesAction()
	{
		$em = $this -> getDoctrine()->getManager();
		$categories = $em -> getRepository('VoitureFrontOfficeBundle:Categories') -> findAll();

		return $this ->render('VoitureFrontOfficeBundle:Layout:categories.html.twig', array('categories'=>$categories));
	}

}