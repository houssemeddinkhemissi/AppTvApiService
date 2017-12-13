<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Favori
 *
 * @ORM\Table(name="favori")
 * @ORM\Entity
 */
class Favori
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idfavori", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfavori;

    /**
     * @var string
     *
     * @ORM\Column(name="nomfav", type="string", length=45, nullable=true)
     */
    private $nomfav;

    /**
     * @var \Chaine
     *
     * @ORM\OneToOne(targetEntity="Chaine")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="chaine_idChaine", referencedColumnName="idChaine")
     * })
     */
    private $chainechaine;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_iduser", referencedColumnName="iduser")
     * })
     */
    private $useruser;


}

