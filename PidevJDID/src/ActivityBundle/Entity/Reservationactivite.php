<?php

namespace ActivityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservationactivite
 *
 * @ORM\Table(name="reservationactivite", indexes={@ORM\Index(name="idActivity", columns={"idActivity"}), @ORM\Index(name="idClient", columns={"idClient"})})
 * @ORM\Entity
 */
class Reservationactivite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="idActivity", type="integer", nullable=false)
     */
    private $idactivity;

    /**
     * @var integer
     *
     * @ORM\Column(name="idClient", type="integer", nullable=false)
     */
    private $idclient;



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
     * Set idactivity
     *
     * @param integer $idactivity
     *
     * @return Reservationactivite
     */
    public function setIdactivity($idactivity)
    {
        $this->idactivity = $idactivity;

        return $this;
    }

    /**
     * Get idactivity
     *
     * @return integer
     */
    public function getIdactivity()
    {
        return $this->idactivity;
    }

    /**
     * Set idclient
     *
     * @param integer $idclient
     *
     * @return Reservationactivite
     */
    public function setIdclient($idclient)
    {
        $this->idclient = $idclient;

        return $this;
    }

    /**
     * Get idclient
     *
     * @return integer
     */
    public function getIdclient()
    {
        return $this->idclient;
    }
}
