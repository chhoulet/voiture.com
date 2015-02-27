<?php

namespace Voiture\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Voiture\FrontOfficeBundle\Entity\Messages;
use Voiture\FrontOfficeBundle\Form\MessageType;
use Symfony\Component\HttpFoundation\Request;

class StaticController extends Controller
{
	public function conditionsAction()
	{
		return $this -> render("VoitureFrontOfficeBundle:Static:conditions_generales_utilisation.html.twig");
	}

	public function mentionsAction()
	{
		return  $this -> render("VoitureFrontOfficeBundle:Static:mentions_legales.html.twig");
	}

	public function contactAction(Request $request)
	{
		$message = new Messages();
		$form = $this -> createForm(new MessageType, $message);

		$form -> handleRequest($request);

		if ($form -> isValid()){
			$em = $this -> getDoctrine()->getManager();
			$message -> setDateCreated(new \DateTime('now'));
			$em -> persist($message);
			$em -> flush();

		$request->get('session')->getFlashBag()->add('succes','Votre message a bien été envoyé');

		return $this  ->  redirect($this -> generateUrl('voiture_front_office_homepage'));
		}

		return $this -> render("VoitureFrontOfficeBundle:Static:contact.html.twig", array('form'=>$form->createView()));
	}

}