<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notification
 *
 * @ORM\Table(name="notification")
 * @ORM\Entity
 */
class Notification
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idnotification", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idnotification;

    /**
     * @var string
     *
     * @ORM\Column(name="heurnotif", type="string", length=45, nullable=true)
     */
    private $heurnotif;

    /**
     * @var \Emisson
     *
     * @ORM\OneToOne(targetEntity="Emisson")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Emisson_idEmisson", referencedColumnName="idEmisson")
     * })
     */
    private $emissonemisson;

    /**
     * @var \User
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="User",inversedBy="Notifications")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_iduser", referencedColumnName="iduser")
     * })
     */
    private $user;


}

