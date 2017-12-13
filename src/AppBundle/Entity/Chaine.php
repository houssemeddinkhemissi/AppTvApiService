<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chaine
 *
 * @ORM\Table(name="chaine")
 * @ORM\Entity
 */
class Chaine
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idChaine", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idchaine;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=true, unique=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Image", type="string", length=45, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=45, nullable=true)
     */
    private $pays;

    /**
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param string $pays
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    }



    /**
     * @return int
     */
    public function getIdchaine()
    {
        return $this->idchaine;
    }

    /**
     * @param int $idchaine
     */
    public function setIdchaine($idchaine)
    {
        $this->idchaine = $idchaine;
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




}

