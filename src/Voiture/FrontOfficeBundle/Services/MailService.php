<?php

namespace Voiture\FrontOfficeBundle\Services;

class MailService 
{
	/**
	 * @var \Swift_Mailer
	 */
	private $mailer;

	/**
	 * @param \Swift_Mailer $mailer
	 */
	public function __construct($mailer)
	{
		$this->mailer = $mailer;
	}

	public function send($content)
	{
		$message = \Swift_Message::newInstance();
		$message ->setSubject('Nouveau Message')
				 ->setTo('chhoulet@yahoo.fr')
				 ->setFrom('chhoulet@yahoo.fr')
				 ->setBody($content);
//$this permet d'avoir accès
// à l'ensemble des fonctions et propriétés de la classe MailService, 
// ->mailer me donne accès à l'ensemble des	fonctions et propriétés de la classe native 'SwiftMailer',			 
// -> send est l'une des fonctions natives de SwiftMailer qui envoie le mail.				 
		$this ->mailer->send($message);
	}
}