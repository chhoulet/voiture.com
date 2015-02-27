<?php

namespace Voiture\UsersBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * UsersRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UsersRepository extends EntityRepository
{
	public function countUsers()
	{
		$query = $this -> getEntityManager()->createQuery('
			SELECT COUNT(u.id)
			FROM VoitureUsersBundle:Users u');

		return $query -> getSingleScalarResult();
	}
}