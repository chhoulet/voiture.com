<?php

namespace Voiture\FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Voiture\FrontOfficeBundle\Entity\Annonces;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Categories
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Voiture\FrontOfficeBundle\Entity\CategoriesRepository")
 */
class Categories
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
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Voiture\FrontOfficeBundle\Entity\Annonces", mappedBy="categorie")
     * @ORM\Column(name="annonce", type="string", length=255)
     */
    private $annonce;

     /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="Voiture\FrontOfficeBundle\Entity\Garages", inversedBy="categorie")
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
     * @return Categories
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
     * Set annonce
     *
     * @param string $annonce
     * @return Categories
     */
    public function setAnnonce($annonce)
    {
        $this->annonce = $annonce;

        return $this;
    }

    /**
     * Get annonce
     *
     * @return string 
     */
    public function getAnnonce()
    {
        return $this->annonce;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->annonce = new \Doctrine\Common\Collections\ArrayCollection();
        $this->garage = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add annonce
     *
     * @param \Voiture\FrontOfficeBundle\Entity\Annonces $annonce
     * @return Categories
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
     * Add garage
     *
     * @param \Voiture\FrontOfficeBundle\Entity\Garages $garage
     * @return Categories
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
     * @return Categories
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

    public function  __toString()
    {
        return $this->name;
    }
}
