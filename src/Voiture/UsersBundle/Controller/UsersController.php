<?php

namespace Voiture\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Voiture\UsersBundle\Entity\Users;
use Voiture\UsersBundle\Form\UsersType;
use Voiture\UsersBundle\Form\UsersInscriptionType;


class UsersController extends Controller
{
	/* 'action' sert à envoyer les données du formulaire vers la route d'authentification*/
    public function connectionUserAction()
    {
    	$form = $this -> createForm(new UsersType(), null, array(
			'action' => $this->generateUrl('voiture_users_login_check')
		));


        return $this->render('VoitureUsersBundle:Users:connectionUser.html.twig', array('form' => $form->createView()));
    }

    public function createUserAction(Request $request)
    {
    	$em = $this ->getDoctrine() -> getManager();
    	$user = new Users();
    	$formUser = $this -> createForm(new UsersInscriptionType(), $user,  
            array('action'=>$this->generateUrl('voiture_users_creationUser'), 'method'=>'POST'));

    	$formUser -> handleRequest($request);

    	if ($formUser -> isValid()){
    		$em -> persist($user);
    		$em -> flush();
            
            $this -> get('session')->getFlashBag()->add('succes','Vous êtes bien enregistré dans notre base de données !');
    		return $this -> redirect($this ->generateUrl('voiture_front_office_homepage'));
    	}

    	
    	return $this -> render('VoitureUsersBundle:Users:createUser.html.twig',array('formUser' => $formUser->createView()));
    }

    public function showUsersAction()
    {
        $em = $this -> getDoctrine()->getManager();
        $showUsers = $em -> getRepository('VoitureUsersBundle:Users')-> findAll();

        return $this -> render('VoitureUsersBundle:Users:showUsers.html.twig',array('showUsers'=>$showUsers));
    }

}
