<?php

namespace Voiture\FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Voiture\FrontOfficeBundle\Entity\Annonces;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Brand
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Voiture\FrontOfficeBundle\Entity\BrandRepository")
 */
class Brand
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
     * @var datetime
     *
     * @ORM\Column(name="upDated", type="datetime", length=255, nullable=true)
     */
    private $upDated;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Voiture\FrontOfficeBundle\Entity\Annonces", mappedBy="brand")
     */
    private $annonces;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Voiture\FrontOfficeBundle\Entity\Car", mappedBy="brand")
     */
    private $cars;


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
     * @return Brand
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
     * Set slug
     *
     * @param string $slug
     * @return Brand
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->annonces = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add annonces
     *
     * @param \Voiture\FrontOfficeBundle\Entity\Annonces $annonces
     * @return Brand
     */
    public function addAnnonce(\Voiture\FrontOfficeBundle\Entity\Annonces $annonces)
    {
        $this->annonces[] = $annonces;

        return $this;
    }

    /**
     * Remove annonces
     *
     * @param \Voiture\FrontOfficeBundle\Entity\Annonces $annonces
     */
    public function removeAnnonce(\Voiture\FrontOfficeBundle\Entity\Annonces $annonces)
    {
        $this->annonces->removeElement($annonces);
    }

    /**
     * Get annonces
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAnnonces()
    {
        return $this->annonces;
    }

    public function __toString()
    {
        return $this -> name;
    }

    /**
     * Set upDated
     *
     * @param \DateTime $upDated
     * @return Brand
     */
    public function setUpDated($upDated)
    {
        $this->upDated = $upDated;

        return $this;
    }

    /**
     * Get upDated
     *
     * @return \DateTime 
     */
    public function getUpDated()
    {
        return $this->upDated;
    }

    /**
     * Add cars
     *
     * @param \Voiture\FrontOfficeBundle\Entity\Car $cars
     * @return Brand
     */
    public function addCar(\Voiture\FrontOfficeBundle\Entity\Car $cars)
    {
        $this->cars[] = $cars;

        return $this;
    }

    /**
     * Remove cars
     *
     * @param \Voiture\FrontOfficeBundle\Entity\Car $cars
     */
    public function removeCar(\Voiture\FrontOfficeBundle\Entity\Car $cars)
    {
        $this->cars->removeElement($cars);
    }

    /**
     * Get cars
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCars()
    {
        return $this->cars;
    }
}
