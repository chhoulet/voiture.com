<?php

namespace Voiture\FrontOfficeBundle\Entity;

use Doctrine\ORM\EntityRepository;

class MessagesRepository extends EntityRepository
{
	public function countMessages()
	{
		$query = $this -> getEntityManager()->createQuery('
			SELECT COUNT(m.id)
			FROM VoitureFrontOfficeBundle:Messages m');

		return $query -> getSingleScalarResult();
	}
}