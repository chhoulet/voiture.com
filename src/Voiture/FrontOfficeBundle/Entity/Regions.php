<?php

namespace Voiture\FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Regions
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Voiture\FrontOfficeBundle\Entity\RegionsRepository")
 */
class Regions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\Length(
     *      min = "2",
     *      max = "50",
     *      minMessage = "Votre nom doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre nom ne peut pas être plus long que {{ limit }} caractères"
     * )
     */
    private $name;

     /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     * @Assert\Length(
     *      min = "2",
     *      max = "50",
     *      minMessage = "Votre slug doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre slug ne peut pas être plus long que {{ limit }} caractères"
     * )
     */
    private $slug;


    /**
     * @var integer
     *
     * @ORM\Column(name="zipcode", type="integer")
     * @Assert\NotBlank()
     */
    private $zipcode;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Voiture\FrontOfficeBundle\Entity\Annonces", mappedBy="region")
     */
    private $annonce;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Voiture\FrontOfficeBundle\Entity\Garages",mappedBy="region")
     */
    private $garage;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Regions
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set zipcode
     *
     * @param integer $zipcode
     * @return Regions
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get zipcode
     *
     * @return integer 
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->annonce = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add annonce
     *
     * @param \Voiture\FrontOfficeBundle\Entity\Annonces $annonce
     * @return Regions
     */
    public function addAnnonce(\Voiture\FrontOfficeBundle\Entity\Annonces $annonce)
    {
        $this->annonce[] = $annonce;

        return $this;
    }

    /**
     * Remove annonce
     *
     * @param \Voiture\FrontOfficeBundle\Entity\Annonces $annonce
     */
    public function removeAnnonce(\Voiture\FrontOfficeBundle\Entity\Annonces $annonce)
    {
        $this->annonce->removeElement($annonce);
    }

    /**
     * Get annonce
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAnnonce()
    {
        return $this->annonce;
    }

    /**
     * Add garage
     *
     * @param \Voiture\FrontOfficeBundle\Entity\Garages $garage
     * @return Regions
     */
    public function addGarage(\Voiture\FrontOfficeBundle\Entity\Garages $garage)
    {
        $this->garage[] = $garage;

        return $this;
    }

    /**
     * Remove garage
     *
     * @param \Voiture\FrontOfficeBundle\Entity\Garages $garage
     */
    public function removeGarage(\Voiture\FrontOfficeBundle\Entity\Garages $garage)
    {
        $this->garage->removeElement($garage);
    }

    /**
     * Get garage
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGarage()
    {
        return $this->garage;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Regions
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    public function __toString()
    {
        return $this -> name;
    }
}
