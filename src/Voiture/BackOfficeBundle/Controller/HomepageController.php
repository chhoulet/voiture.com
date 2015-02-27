<?php

namespace Voiture\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller
{
    public function homePageAction()
    {
    	  $em = $this ->getDoctrine()->getManager();
    	  $nombreAnnonces = $em -> getRepository('VoitureFrontOfficeBundle:Annonces')->countAnnonces();
    	  $lastAnnoncePublished = $em -> getRepository('VoitureFrontOfficeBundle:Annonces')->lastAnnoncePublished();
        $nbCategories = $em -> getRepository('VoitureFrontOfficeBundle:Categories')->countCategories();
        $nbMessages = $em -> getRepository('VoitureFrontOfficeBundle:Messages')->countMessages();
        $nbComments = $em -> getRepository('VoitureFrontOfficeBundle:Comments')->countComments();
        $nbGarages = $em -> getRepository('VoitureFrontOfficeBundle:Garages')->countGarage();
        $nbUsers = $em -> getRepository('VoitureUsersBundle:Users')->countUsers();
        $nbBrand = $em -> getRepository('VoitureFrontOfficeBundle:Brand')->countBrand();
        $nbRegion = $em -> getRepository('VoitureFrontOfficeBundle:Regions')->countRegions();
        $renaultEssonne = $em -> getRepository('VoitureFrontOfficeBundle:Annonces')->RenaultEssonne();
    	  $getBrandWithLessAnnonces = $em -> getRepository('VoitureFrontOfficeBundle:Annonces')->getBrandWithLessAnnonces();
        dump($getBrandWithLessAnnonces);

        return $this->render('VoitureBackOfficeBundle:Homepage:homepageBackOffice.html.twig',
        	array('nombreAnnonces'       => $nombreAnnonces,
        		  'lastAnnoncePublished' => $lastAnnoncePublished,
                  'nbCategories'         => $nbCategories,
                  'nbMessages'           => $nbMessages,
                  'nbComments'           => $nbComments,
                  'nbGarages'            => $nbGarages,
                  'nbUsers'              => $nbUsers,
                  'nbBrand'              => $nbBrand,
                  'nbRegion'             => $nbRegion,
                  'renaultEssonne'       => $renaultEssonne,
                  'getBrandWithLessAnnonces' => $getBrandWithLessAnnonces
        		  /*'annoncesRecentes'     => $annoncesRecentes*/));
    }
}
