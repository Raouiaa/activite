<?php

namespace ActivityBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * Activity
 *
 * @ORM\Table(name="activity")
 * @ORM\Entity(repositoryClass="ActivityBundle\Repository\ActivityRepository")
 */
class Activity
{
    /**
     * @var string
     *
     * @ORM\Column(name="adresseActivite", type="string", length=255, nullable=false)
     */
    private $adresseactivite;

    /**
     * @var integer
     *
     * @ORM\Column(name="idActivite", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idactivite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateactivite", type="date")
     */
    private $dateactivite;

    /**
     * @var string
     *
     * @ORM\Column(name="typeActivite", type="string", length=255, nullable=false)
     */
    private $typeactivite;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="imagActivity", type="string", length=255, nullable=false)
     */
    public $imagactivity;
    /**
     * @Assert\File(maxSize="5000k")
     */
    public $file;

    /**
     * Set adresseactivite
     *
     * @param string $adresseactivite
     *
     * @return Activity
     */
    public function setAdresseactivite($adresseactivite)
    {
        $this->adresseactivite = $adresseactivite;

        return $this;
    }

    /**
     * Get adresseactivite
     *
     * @return string
     */
    public function getAdresseactivite()
    {
        return $this->adresseactivite;
    }

    /**
     * Get idactivite
     *
     * @return integer
     */
    public function getIdactivite()
    {
        return $this->idactivite;
    }

    /**
     * Set dateactivite
     *
     * @param string $dateactivite
     *
     * @return Activity
     */
    public function setDateactivite($dateactivite)
    {
        $this->dateactivite = $dateactivite;

        return $this;
    }

    /**
     * Get dateactivite
     *
     * @return string
     */
    public function getDateactivite()
    {
        return $this->dateactivite;
    }

    /**
     * Set typeactivite
     *
     * @param string $typeactivite
     *
     * @return Activity
     */
    public function setTypeactivite($typeactivite)
    {
        $this->typeactivite = $typeactivite;

        return $this;
    }

    /**
     * Get typeactivite
     *
     * @return string
     */
    public function getTypeactivite()
    {
        return $this->typeactivite;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Activity
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set imagactivity
     *
     * @param string $imagactivity
     *
     * @return Activity
     */
    public function setImagactivity($imagactivity)
    {
        $this->imagactivity = $imagactivity;

        return $this;
    }

    /**
     * Get imagactivity
     *
     * @return string
     */
    public function getImagactivity()
    {
        return $this->imagactivity;
    }
    public function getWebPath()
    {
        return null=== $this->imagactivity ? null : $this->getUploadDir.'/'.$this->imagactivity;
    }
    protected  function getUploadRootDir()
    {
        return (__FILE__).'%kernel.root_dir%/../web/uploads'.$this->getUploadDir();
    }
    protected function getUploadDir()
    {
        return 'images';
    }
    public function UploadActivityPicture(){
        $this->file->move($this->getUploadRootDir(),$this->file->getClientOriginalName());
        $this->imagactivity=$this->file->getClientOriginalName();
        $this->file=null;
    }
}

