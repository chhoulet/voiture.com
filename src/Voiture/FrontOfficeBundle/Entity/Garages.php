<?php

namespace Voiture\FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Garages
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Voiture\FrontOfficeBundle\Entity\GaragesRepository")
 */
class Garages
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
     * @ORM\Column(name="ville", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $adress;

    /**
     * @var string
     *
     * @ORM\Column(name="brand", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $brand;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Voiture\FrontOfficeBundle\Entity\Annonces", mappedBy="garage")
     */
    private $annonce;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Voiture\FrontOfficeBundle\Entity\Regions", inversedBy="garage")
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     */
    private $region;

    /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="Voiture\FrontOfficeBundle\Entity\Categories", mappedBy="garage")
     * @ORM\JoinTable(name="categories_garage")
     */
    private $categorie;


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
     * @return Garages
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
     * Set ville
     *
     * @param string $ville
     * @return Garages
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set adress
     *
     * @param string $adress
     * @return Garages
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return string 
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set brand
     *
     * @param string $brand
     * @return Garages
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return string 
     */
    public function getBrand()
    {
        return $this->brand;
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
     * @return Garages
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
     * Set region
     *
     * @param \Voiture\FrontOfficeBundle\Entity\Regions $region
     * @return Garages
     */
    public function setRegion(\Voiture\FrontOfficeBundle\Entity\Regions $region = null)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return \Voiture\FrontOfficeBundle\Entity\Regions 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Add categorie
     *
     * @param \Voiture\FrontOfficeBundle\Entity\Categories $categorie
     * @return Garages
     */
    public function addCategorie(\Voiture\FrontOfficeBundle\Entity\Categories $categorie)
    {
        $this->categorie[] = $categorie;

        return $this;
    }

    /**
     * Remove categorie
     *
     * @param \Voiture\FrontOfficeBundle\Entity\Categories $categorie
     */
    public function removeCategorie(\Voiture\FrontOfficeBundle\Entity\Categories $categorie)
    {
        $this->categorie->removeElement($categorie);
    }

    /**
     * Get categorie
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
}
