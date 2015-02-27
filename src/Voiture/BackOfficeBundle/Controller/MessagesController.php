<?php

namespace Voiture\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Voiture\FrontOfficeBundle\Entity\Messages;

class MessagesController extends Controller
{
	public function showMessagesAction()
	{
		$em = $this -> getDoctrine()->getManager();
		$messages = $em -> getRepository('VoitureFrontOfficeBundle:Messages')-> findAll();

		return $this -> render('VoitureBackOfficeBundle:Messages:showMessages.html.twig',array('messages'=>$messages));
	}

	public function suppressionMessagesAction($id)
	{
		$em = $this ->getDoctrine()->getManager();
		$suppMessage = $em -> getRepository('VoitureFrontOfficeBundle:Messages')->find($id);
		$em ->remove($suppMessage);
		$em -> flush();

		return $this -> redirect($this->generateUrl('voiture_back_office_messages'));
	}
}
