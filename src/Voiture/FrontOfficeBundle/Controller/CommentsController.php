<?php

namespace Voiture\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Voiture\FrontOfficeBundle\Entity\Comments;
use Voiture\FrontOfficeBundle\Form\CommentsType;

class CommentsController extends Controller
{
	public function createCommentsAction(Request $request, $idAnnonce)
	{
		$em = $this -> getDoctrine()-> getManager();
		$content = 'Un nouveau message a été envoyé';
		$comment = new Comments();
		$annonce = $em -> getRepository('VoitureFrontOfficeBundle:Annonces') ->find($idAnnonce);
		$form = $this -> createForm(new CommentsType, $comment, 
			['action'=>$this -> generateUrl('voiture_front_office_comments',['idAnnonce'=> $idAnnonce]) ]);

		$form -> handleRequest($request);

		if ($form -> isValid()){
			$comment -> setDateCreated(new \DateTime('now'));
			$comment -> setAnnonce($annonce);
			$em -> persist($comment);
			$em -> flush();

			$this ->get('session')->getFlashBag()->add('succes','Votre commentaire a bien été ajouté !');
			/*$this sert a appeller toutes les ppropriétés et functions de la classe et de celles de la clsse controller, ou il y a le get, getDoctrine, redirect etc...
			on se sert du get pour appeller le service envoi de mail tel que l'on le définit dans l'onglet 'services.yml,
			puis on utilise la fonction personnalisée créée par nous qui contient le corps du mail.*/
			$this ->get('voiture_front_office.services.mail')->send($content);
			return $this ->redirect($this->generateUrl('voiture_front_office_oneAnnonce', ['id'=>$idAnnonce]));
		}

		return $this ->render('VoitureFrontOfficeBundle:Comments:createComments.html.twig', array('form'=>$form->createView()));
	}

	public function afficheCommentsAction($annonce_id)
	{
		$em = $this -> getDoctrine()->getManager();
		$afficheComments = $em -> getRepository('VoitureFrontOfficeBundle:Comments')->findByAnnonce($annonce_id);

		return $this -> render('VoitureFrontOfficeBundle:Comments:afficheComments.html.twig', array('afficheComments'=>$afficheComments));
	}
}