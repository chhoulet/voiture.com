<?php

namespace Voiture\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Voiture\FrontOfficeBundle\Entity\Categories;
use Voiture\FrontOfficeBundle\Form\CategoriesType;

class CategorieController extends Controller
{
	public function showCategoriesAction()
	{
		$em = $this -> getDoctrine() -> getManager();
		$categories = $em -> getRepository('VoitureFrontOfficeBundle:Categories') -> findAll();

		return $this -> render('VoitureBackOfficeBundle:Categories:showCategories.html.twig', 
			array('categories'=>$categories));

	}

	public function creationCategorieAction(Request $request)
	{
		$em = $this -> getDoctrine()->getManager();
		$categorie = new Categories();
		$form = $this -> createForm(new CategoriesType(), $categorie);

		$form -> handleRequest($request);

		if($form -> isValid()){
			$em -> persist($categorie);
			$em -> flush();

		$this -> get('session')->getFlashBag()->add('succes', 'Vous avez bien créée une nouvelle catégorie !');
		
		return $this -> redirect($this -> generateUrl('voiture_back_office_showCategories'));
		}

		return $this->render('VoitureBackOfficeBundle:Categories:creationCategorie.html.twig',array('form'=>$form->createView()));
	}

	public function editionCategorieAction(Request $request, $id)
	{
		$em = $this -> getDoctrine() ->getManager();
		$categorie = $em -> getRepository('VoitureFrontOfficeBundle:Categories')->find($id);
		$form = $this -> createForm(new CategoriesType(), $categorie);

		$form -> handleRequest($request);

		if($form -> isValid()){
			$em -> persist($categorie);
			$em -> flush();

		return $this->redirect($this->generateUrl('voiture_front_office_showCategories'));
		}

		return $this ->render('VoitureBackOfficeBundle:Categories:editionCategorie.html.twig',array('form'=>$form->createView()));
	}

	public function suppCategoriesAction($id)
	{
		$em = $this -> getDoctrine()->getManager();
		$suppCategories = $em -> getRepository('VoitureFrontOfficeBundle:Categories')->find($id);
		$em -> remove($suppCategories);
		$em -> flush();

		return $this -> redirect($this ->generateUrl('voiture_back_office_showCategories')); 

	}

}