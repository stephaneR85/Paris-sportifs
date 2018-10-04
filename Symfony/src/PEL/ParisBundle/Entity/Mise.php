<?php

namespace PEL\ParisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Mise
 *
 * @ORM\Table(name="mise")
 * @ORM\Entity(repositoryClass="PEL\ParisBundle\Repository\MiseRepository")
 */
class Mise
{      
    /**
     * @ORM\ManyToOne(targetEntity="PEL\ParisBundle\Entity\Paris")
     * @ORM\JoinColumn(name="paris_id", referencedColumnName="id")
     */
    private $paris;
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    
    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer")
     * 
     */
    private $id_user;

    /**
     * @var int
     *
     * @ORM\Column(name="mise", type="integer")
     * @Assert\Range(min=1)
     * 
     */
    private $mise;
    /**
     * @var int
     *
     * @ORM\Column(name="scoreEq1", type="integer")
     * @Assert\Range(min=0)
     */
    private $scoreEq1;
    
    /**
     * @var int
     *
     * @ORM\Column(name="scoreEq2", type="integer")
     * @Assert\Range(min=0)
     * 
     */
    private $scoreEq2;
    
    /**
     * @var int
     *
     * @ORM\Column(name="gain", type="integer", nullable=true)
     * 
     */
    private $gain;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set mise
     *
     * @param integer $mise
     *
     * @return Mise
     */
    public function setMise($mise)
    {
        $this->mise = $mise;

        return $this;
    }

    /**
     * Get mise
     *
     * @return int
     */
    public function getMise()
    {
        return $this->mise;
    }

    /**
     * Set scoreEq1
     *
     * @param integer $scoreEq1
     *
     * @return Mise
     */
    public function setScoreEq1($scoreEq1)
    {
        $this->scoreEq1 = $scoreEq1;

        return $this;
    }

    /**
     * Get scoreEq1
     *
     * @return integer
     */
    public function getScoreEq1()
    {
        return $this->scoreEq1;
    }

    /**
     * Set scoreEq2
     *
     * @param integer $scoreEq2
     *
     * @return Mise
     */
    public function setScoreEq2($scoreEq2)
    {
        $this->scoreEq2 = $scoreEq2;

        return $this;
    }

    /**
     * Get scoreEq2
     *
     * @return integer
     */
    public function getScoreEq2()
    {
        return $this->scoreEq2;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return Mise
     */
    public function setIdUser($idUser)
    {
        $this->id_user = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->id_user;
    }


    /**
     * Set paris
     *
     * @param \PEL\ParisBundle\Entity\Paris $paris
     *
     * @return Mise
     */
    public function setParis(\PEL\ParisBundle\Entity\Paris $paris = null)
    {
        $this->paris = $paris;

        return $this;
    }

    /**
     * Get paris
     *
     * @return \PEL\ParisBundle\Entity\Paris
     */
    public function getParis()
    {
        return $this->paris;
    }

    /**
     * Set gain
     *
     * @param integer $gain
     *
     * @return Mise
     */
    public function setGain($gain)
    {
        $this->gain = $gain;

        return $this;
    }

    /**
     * Get gain
     *
     * @return integer
     */
    public function getGain()
    {
        return $this->gain;
    }
}
