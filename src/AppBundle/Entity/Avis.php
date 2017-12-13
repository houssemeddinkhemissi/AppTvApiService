<?php


namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Avis
 *
 * @ORM\Table(name="avis")
 * @ORM\Entity
 */
class Avis
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idavis", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idavis;

    /**
     * @var string
     *
     * @ORM\Column(name="avis", type="string", length=100, nullable=true)
     */
    private $avis;

    /**
     * @var \Emisson
     *
     * @ORM\ManyToOne(targetEntity="Emisson")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Emisson_idEmisson", referencedColumnName="idEmisson")
     * })
     */
    private $emissonemisson;

    /**
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="iduser")
     * })
     */
    private $user;
}

