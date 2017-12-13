<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emisson
 *
 * @ORM\Table(name="emisson")
 * @ORM\Entity
 */
class Emisson
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idEmisson", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idemisson;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=45, nullable=true)
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="temps", type="string", length=45, nullable=true)
     */
    private $temps;

    /**
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Chaine")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="chaine", referencedColumnName="idChaine")
     * })
     */
    private $chaine;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TempsAjout", type="datetime", nullable=true)
     */
    private $TempsAjout = 'CURRENT_TIMESTAMP';



    /**
     * @return int
     */
    public function getIdemisson()
    {
        return $this->idemisson;
    }

    /**
     * @param int $idemisson
     */
    public function setIdemisson($idemisson)
    {
        $this->idemisson = $idemisson;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param string $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * @return mixed
     */
    public function getChaine()
    {
        return $this->chaine;
    }

    /**
     * @param mixed $chaine
     */
    public function setChaine($chaine)
    {
        $this->chaine = $chaine;
    }

    /**
     * @return string
     */
    public function getTemps()
    {
        return $this->temps;
    }

    /**
     * @param string $temps
     */
    public function setTemps($temps)
    {
        $this->temps = $temps;
    }

    /**
     * @return \DateTime
     */
    public function getTempsAjout()
    {
        return $this->TempsAjout;
    }

    /**
     * @param \DateTime $TempsAjout
     */
    public function setTempsAjout($TempsAjout)
    {
        $this->TempsAjout = $TempsAjout;
    }






}

