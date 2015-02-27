<?php

namespace Voiture\FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Messages
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Voiture\FrontOfficeBundle\Entity\MessagesRepository")
 */
class Messages
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
     * @Assert\Length(
     *      min = "2",
     *      max = "50",
     *      minMessage = "Votre username doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre username ne peut pas être plus long que {{ limit }} caractères"
     * )
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;

    /**
     * @Assert\Length(
     *      min = "2",
     *      max = "50",
     *      minMessage = "Le sujet choisi doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Le sujet choisi ne peut pas être plus long que {{ limit }} caractères"
     * )
     * @ORM\Column(name="sujet", type="string", length=255)
     */
    private $sujet;

    /**
     * @Assert\Length(
     *      min = "25",
     *      max = "250",
     *      minMessage = "Le contenu doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Le contenu ne peut pas être plus long que {{ limit }} caractères"
     * )
     * @ORM\Column(name="content", type="string")
     */
    private $content;

    /**
     * @Assert\DateTime()
     */
    private $dateCreated;

    /**
    * @Assert\Email(
    *     message = "'{{ value }}' n'est pas un email valide.",
    *     checkMX = true
    *)
    * @ORM\Column(name="email", type="string", length=255)
    */
    private $email;


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
     * @return Messages
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
     * Set sujet
     *
     * @param string $sujet
     * @return Messages
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }

    /**
     * Get sujet
     *
     * @return string 
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Messages
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
     * @return Messages
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
     * Set email
     *
     * @param string $email
     * @return Messages
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
}
