<?php

namespace Voiture\FrontOfficeBundle\Entity;

use Doctrine\ORM\EntityRepository;

class BrandRepository extends EntityRepository
{
	public function countBrand()
	{
		$query = $this -> getEntityManager()->createQuery('
			SELECT COUNT(b.id) 
			FROM VoitureFrontOfficeBundle:Brand b');

		return $query -> getSingleScalarResult();
	}
}