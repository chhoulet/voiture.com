<?php

namespace Voiture\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Voiture\FrontOfficeBundle\Entity\Annonces;
use Voiture\FrontOfficeBundle\Form\AnnoncesType;
use Voiture\FrontOfficeBundle\Form\KilometersType;
use Voiture\FrontOfficeBundle\Form\DateFirstAcquireType;
use Voiture\FrontOfficeBundle\Form\PriceType;
use Voiture\FrontOfficeBundle\Form\DateCreatedType;

class AccueilController extends Controller
{
	public function homepageAction(Request $request)
	{
		$em = $this ->getDoctrine()->getManager();
		//Tri des annonces par marques
		$annonces = $em ->getRepository('VoitureFrontOfficeBundle:Annonces')->getAnnonceGroupedByBrand();
		//Affichage d'un garage
		$garage = $em -> getRepository('VoitureFrontOfficeBundle:Garages')->getOneGarage();


		//Formulaire de choix des annonces par kilométrage :
		$formKm = $this -> createForm(new KilometersType());
		//Soumisson des données du formulaire :
		$formKm -> handleRequest($request);

		if($formKm -> isValid()){
			//Récupération des données du formulaire :
			$data = $formKm->getData();
			//Attribution de la valeur du parametre $kilometers définie dans le repository :
			$kilometers = $em -> getRepository('VoitureFrontOfficeBundle:Annonces')->getKilometers($data['kilometers']);
			
			return $this ->render('VoitureFrontOfficeBundle:Annonces:showAnnonces.html.twig', array('showAnnonces'=>$kilometers));
		}


		//Création du formulaire de tri des annonces par date de mise en circulation :
		$formFirstAcquire = $this -> createForm(new DateFirstAcquireType());
		$formFirstAcquire -> handleRequest($request);

		if($formFirstAcquire -> isValid()){
			$datas = $formFirstAcquire -> getData();
			$dateFirstAcquire = $em -> getRepository('VoitureFrontOfficeBundle:Annonces')->getAnnoncesByDateFirstAcquire($datas['DateFirstAcquire']);

			return $this -> render('VoitureFrontOfficeBundle:Annonces:showAnnonces.html.twig',array('showAnnonces'=>$dateFirstAcquire));
		}


		//Création du formulaire de tri des annonces par prix:
		$formPrice = $this -> createForm(new PriceType());
		$formPrice ->handleRequest($request);

		if($formPrice -> isValid()){
			$dataPrice = $formPrice -> getData();
			$price = $em -> getRepository('VoitureFrontOfficeBundle:Annonces')->getAnnonceByPrice($dataPrice['price']);

			return $this-> render('VoitureFrontOfficeBundle:Annonces:showAnnonces.html.twig', array('showAnnonces'=>$price));
		}



		//Création du formulaire de dépôt d'annonce :
		$annonce = new Annonces();
		$form = $this  -> createForm(new AnnoncesType(), $annonce);

		$form -> handleRequest($request);

		if ($form ->  isValid()){
			$annonce -> setDateCreated(new \dateTime('now'));
			$em -> persist($annonce);
			$em -> flush();

			$this->get('session')->getFlashBag()->add('succes','Votre annonce a bien été créée !');
			return $this -> redirect($this ->generateUrl('voiture_front_office_homepage'));
		}

		//Création du formulaire de tri des annonces par date de parution:
		$formDateCreated = $this -> createForm(new DateCreatedType()); 
		$formDateCreated -> handleRequest($request);

		if($formDateCreated -> isValid()){
			$dataDateCreated = $formDateCreated -> getData();
			$dateCreated = $em -> getRepository('VoitureFrontOfficeBundle:Annonces')->triParDate($dataDateCreated['dateCreated']);

			return $this->render('VoitureFrontOfficeBundle:Annonces:showAnnonces.html.twig', array('showAnnonces'=>$dateCreated));

		}

		return $this -> render('VoitureFrontOfficeBundle:Accueil:homepageFrontOffice.html.twig', array(
				'annonces'			=> $annonces,
				'garage'  			=> $garage,
				'form'    			=> $form             ->createView(),
				'formKm'  			=> $formKm			 ->createView(),
				'formFirstAcquire'  => $formFirstAcquire ->createView(),
				'formPrice'			=> $formPrice		 ->createView(),
				'formDateCreated'   => $formDateCreated  ->createView())
		);
	}
}







