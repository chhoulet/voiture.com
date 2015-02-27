<?php

namespace Voiture\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Voiture\FrontOfficeBundle\Entity\Comments;
use Voiture\FrontOfficeBundle\Form\CommentsType;

class CommentsController extends Controller
{
	public function editionCommentaireAction(Request $request,$id)
	{
		$em = $this ->getDoctrine()->getManager();
		$comment = $em -> getRepository('VoitureFrontOfficeBundle:Comments')->find($id);
		$form = $this ->createForm(new CommentsType(), $comment);

		$form -> handleRequest($request);

		if($form -> isValid()){
			$em -> persist($comment);
			$em -> flush();

			return $this -> redirect($this->generateUrl('voiture_back_office_showComments'));
		}

		return $this -> render('VoitureBackOfficeBundle:Comments:editionCommentaire.html.twig', array('form'=>$form->createView()));
	}

	public function showCommentsAction()
	{
		$em = $this ->getDoctrine()->getManager();
		$comments = $em -> getRepository('VoitureFrontOfficeBundle:Comments')->findAll();

		return $this -> render('VoitureBackOfficeBundle:Comments:showComments.html.twig', array('comments'=>$comments));
	}

	public function suppCommentsAction($id)
	{
		$em = $this -> getDoctrine()->getManager();
		$suppComment = $em -> getRepository('VoitureFrontOfficeBundle:Comments')->find($id);
		$em -> remove($suppComment);
		$em -> flush();

		return $this -> redirect($this->generateUrl('voiture_back_office_showComments'));
	}
}
