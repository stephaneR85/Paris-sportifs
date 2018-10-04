<?php

namespace PEL\ParisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Resultats
 *
 * @ORM\Table(name="resultats")
 * @ORM\Entity(repositoryClass="PEL\ParisBundle\Repository\ResultatsRepository")
 */
class Resultats
{
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
     * @Assert\Range(min=0)
     * @ORM\Column(name="scoreEq1", type="integer")
     */
    private $scoreEq1;

    /**
     * @var int
     * @ORM\Column(name="scoreEq2", type="integer")
     * @Assert\Range(min=0)
     */
    private $scoreEq2;


    /**
     * Get id
     * @Assert\Range(min=0)
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set scoreEq1
     *
     * @param integer $scoreEq1
     *
     * @return Resultats
     */
    public function setScoreEq1($scoreEq1)
    {
        $this->scoreEq1 = $scoreEq1;

        return $this;
    }

    /**
     * Get scoreEq1
     *
     * @return int
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
     * @return Resultats
     */
    public function setScoreEq2($scoreEq2)
    {
        $this->scoreEq2 = $scoreEq2;

        return $this;
    }

    /**
     * Get scoreEq2
     *
     * @return int
     */
    public function getScoreEq2()
    {
        return $this->scoreEq2;
    }

}
