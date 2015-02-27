<?php

namespace Voiture\FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Voiture\FrontOfficeBundle\Entity\Categories;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Annonces
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Voiture\FrontOfficeBundle\Entity\AnnoncesRepository")
 */
class Annonces
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
     * @Assert\NotBlank()
     * @ORM\Column(name="username", type="string")
     */
    private $username;

    /**
     * @Assert\Length(
     *      min = "2",
     *      max = "250",
     *      minMessage = "Votre message doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre message ne peut pas être plus long que {{ limit }} caractères"
     * )
     * @ORM\Column(name="content", type="string")
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreated", type="datetime")
     */
    private $dateCreated;
   
    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Voiture\FrontOfficeBundle\Entity\Brand", inversedBy="annonces")
     * @ORM\JoinColumn(name="brand_id", referencedColumnName="id")
     */
    private $brand;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="model", type="string", length=255)
     */
    private $model;

    /**
     * @Assert\Range(
     *      min = 10,
     *      max = 350000,
     *      minMessage = "Le véhicule doit compter au moins {{ limit }} kilomètres",
     *      maxMessage = "Le véhicule ne doit pas compter plus de {{ limit }} kilomètres"
     * )
     * @ORM\Column(name="kilometers", type="integer")
     */
    private $kilometers;

    /**
     * @Assert\Length(
     *      min = "",
     *      max = "20",
     *      minMessage = "Le type de moteur doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Le type de moteur ne peut pas être plus long que {{ limit }} caractères"
     * )
     * @ORM\Column(name="engine", type="string")
     */
    private $engine;

    /**
     * @var integer
     * @Assert\Range(
     *      min = 1500,
     *      max = 1000000,
     *      minMessage = "Le prix ne peut être inférieur à {{ limit }}",
     *      maxMessage = "Le prix ne peut dépasser {{ limit }}"
     * )
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @Assert\Date()
     * @Assert\NotBlank()
     * @ORM\Column(name="dateFirstAcquire", type="date")
     */
    private $dateFirstAcquire;


    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Voiture\FrontOfficeBundle\Entity\Categories", inversedBy="annonce")
     * @ORM\JoinColumn(name="categorie_id",referencedColumnName="id")
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Voiture\FrontOfficeBundle\Entity\Regions", inversedBy="annonce")
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     */
    private $region;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Voiture\FrontOfficeBundle\Entity\Garages", inversedBy="annonce")
     * @ORM\JoinColumn(name="garage_id", referencedColumnName="id")
     */
    private $garage;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Voiture\FrontOfficeBundle\Entity\Comments", mappedBy="annonce")
     */
    private $comments;

    
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
     * Set username
     *
     * @param string $username
     * @return Annonces
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Annonces
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Annonces
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }


    /**
     * Set model
     *
     * @param string $model
     * @return Annonces
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string 
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set kilometers
     *
     * @param string $kilometers
     * @return Annonces
     */
    public function setKilometers($kilometers)
    {
        $this->kilometers = $kilometers;

        return $this;
    }

    /**
     * Get kilometers
     *
     * @return string 
     */
    public function getKilometers()
    {
        return $this->kilometers;
    }

    /**
     * Set engine
     *
     * @param string $engine
     * @return Annonces
     */
    public function setEngine($engine)
    {
        $this->engine = $engine;

        return $this;
    }

    /**
     * Get engine
     *
     * @return string 
     */
    public function getEngine()
    {
        return $this->engine;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return Annonces
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set dateFirstAcquire
     *
     * @param \Date $dateFirstAcquire
     * @return Annonces
     */
    public function setDateFirstAcquire($dateFirstAcquire)
    {
        $this->dateFirstAcquire = $dateFirstAcquire;

        return $this;
    }

    /**
     * Get dateFirstAcquire
     *
     * @return \Date
     */
    public function getDateFirstAcquire()
    {
        return $this->dateFirstAcquire;
    }


    /**
     * Set categorie
     *
     * @param string $categorie
     * @return Annonces
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set region
     *
     * @param \Voiture\FrontOfficeBundle\Entity\Regions $region
     * @return Annonces
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
     * Set garage
     *
     * @param \Voiture\FrontOfficeBundle\Entity\Garages $garage
     * @return Annonces
     */
    public function setGarage(\Voiture\FrontOfficeBundle\Entity\Garages $garage = null)
    {
        $this->garage = $garage;

        return $this;
    }

    /**
     * Get garage
     *
     * @return \Voiture\FrontOfficeBundle\Entity\Garages 
     */
    public function getGarage()
    {
        return $this->garage;
    }

    /**
     * Set brand
     *
     * @param \Voiture\FrontOfficeBundle\Entity\Brand $brand
     * @return Annonces
     */
    public function setBrand(\Voiture\FrontOfficeBundle\Entity\Brand $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Voiture\FrontOfficeBundle\Entity\Brand 
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
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add comments
     *
     * @param \Voiture\FrontOfficeBundle\Entity\Comments $comments
     * @return Annonces
     */
    public function addComment(\Voiture\FrontOfficeBundle\Entity\Comments $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \Voiture\FrontOfficeBundle\Entity\Comments $comments
     */
    public function removeComment(\Voiture\FrontOfficeBundle\Entity\Comments $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }

    public function __toString()
    {
        return $this -> username;
    }

   

    /**
     * Set image
     *
     * @param string $image
     * @return Annonces
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }
}
