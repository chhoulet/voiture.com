<?php

namespace Voiture\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AnnoncesController extends Controller
{
	public function showAnnoncesAction()
	{
		$em = $this -> getDoctrine() -> getManager();
		$showAnnonces = $em -> getRepository('VoitureFrontOfficeBundle:Annonces') -> findAll();

		return $this -> render('VoitureFrontOfficeBundle:Annonces:showAnnonces.html.twig', array('showAnnonces'=>$showAnnonces));
	}

	public function showAnnoncesByBrandAction($slug)
	{
		$em = $this ->getDoctrine()->getManager();
		// Nous permet de retrouver l'id de la marque via son slug
		$brand = $em ->getRepository('VoitureFrontOfficeBundle:Brand')->findOneBySlug($slug);
		// On recherches toutes les annonces liés à la marque (brand)
		$annonces = $em ->getRepository('VoitureFrontOfficeBundle:Annonces')->findByBrand($brand);

		return $this -> render('VoitureFrontOfficeBundle:Annonces:showAnnoncesByBrand.html.twig', array(
			'annonces'=>$annonces,
			'brand'   =>$brand,
		));
	}

	public function showOneAnnonceAction($id)
	{
		$em = $this -> getDoctrine()->getManager();
		$oneAnnonce = $em -> getRepository('VoitureFrontOfficeBundle:Annonces')->find($id);

		return $this -> render('VoitureFrontOfficeBundle:Annonces:showOneAnnonce.html.twig',array('oneAnnonce'=>$oneAnnonce));
	}

	public function showAnnoncesByCategoriesAction($slug)
	{
		$em = $this -> getDoctrine()->getManager();
		$showIdCategoriesBySlug   = $em ->getRepository('VoitureFrontOfficeBundle:Categories')->findOneBySlug($slug);
		$showAnnoncesByCategories = $em -> getRepository('VoitureFrontOfficeBundle:Annonces')->findByCategorie($showIdCategoriesBySlug);

		return $this->render('VoitureFrontOfficeBundle:Annonces:showAnnoncesByCategories.html.twig', 
			array('showIdCategoriesBySlug'  => $showIdCategoriesBySlug,
				  'showAnnoncesByCategories'=> $showAnnoncesByCategories));
	}

	public function showAnnoncesByRegionsAction($slug)
	{
		$em = $this -> getDoctrine()->getManager();

		$regionBySlug = $em -> getRepository('VoitureFrontOfficeBundle:Regions') -> findOneBySlug($slug);
		$annoncesByRegion = $em ->getRepository('VoitureFrontOfficeBundle:Annonces') ->findByRegion($regionBySlug);

		return $this -> render('VoitureFrontOfficeBundle:Annonces:showAnnoncesByRegions.html.twig', 
			array('regionBySlug'    => $regionBySlug,
				  'annoncesByRegion'=> $annoncesByRegion));
	}

	public function suppAnnonceAction($id)
	{
		$em = $this -> getDoctrine()->getManager();
		$suppAnnonce = $em -> getRepository('VoitureFrontOfficeBundle:Annonces')-> find($id);
		$em -> remove($suppAnnonce);
		$em -> flush();

		return $this->redirect($this->generateUrl('voiture_front_office_showAnnonces'));
	}

	
}

/*Pour recuperer toutes les annonces par le nom de la marque :

		public function showBrandAction($name)
		{
			$em = $this ->getDoctrine()->getManager();
			$brand = $em ->getRepository('VoitureFrontOfficeBundle:Brand')->findOneByName($name)

			return $this -> render('VoitureFrontOfficeBundle:Annonces:showAnnonces.html.twig', array('brand'=>$brand);
		}*/