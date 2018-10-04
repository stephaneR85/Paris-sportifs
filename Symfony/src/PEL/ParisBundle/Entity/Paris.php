<?php

namespace PEL\ParisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paris
 *
 * @ORM\Table(name="paris")
 * @ORM\Entity(repositoryClass="PEL\ParisBundle\Repository\ParisRepository")
 */
class Paris
{
  /**
   * @ORM\OneToOne(targetEntity="PEL\ParisBundle\Entity\Resultats", cascade={"persist", "remove"})
   */
  private $resultats;
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var date
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="equipe1", type="string", length=50)
     */
    private $equipe1;

    /**
     * @var string
     *
     * @ORM\Column(name="equipe2", type="string", length=50)
     */
    private $equipe2;

    /**
     * @var float
     *
     * @ORM\Column(name="coteEq1", type="float")
     */
    private $coteEq1;

    /**
     * @var float
     *
     * @ORM\Column(name="coteEq2", type="float")
     */
    private $coteEq2;

    /**
     * @var string
     *
     * @ORM\Column(name="nomSport", type="string", length=50)
     */
    private $nomSport;

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
     * Set equipe1
     *
     * @param string $equipe1
     *
     * @return Paris
     */
    public function setEquipe1($equipe1)
    {
        $this->equipe1 = $equipe1;

        return $this;
    }

    /**
     * Get equipe1
     *
     * @return string
     */
    public function getEquipe1()
    {
        return $this->equipe1;
    }

    /**
     * Set equipe2
     *
     * @param string $equipe2
     *
     * @return Paris
     */
    public function setEquipe2($equipe2)
    {
        $this->equipe2 = $equipe2;

        return $this;
    }

    /**
     * Get equipe2
     *
     * @return string
     */
    public function getEquipe2()
    {
        return $this->equipe2;
    }

    /**
     * Set coteEq1
     *
     * @param float $coteEq1
     *
     * @return Paris
     */
    public function setCoteEq1($coteEq1)
    {
        $this->coteEq1 = $coteEq1;

        return $this;
    }

    /**
     * Get coteEq1
     *
     * @return float
     */
    public function getCoteEq1()
    {
        return $this->coteEq1;
    }

    /**
     * Set coteEq2
     *
     * @param float $coteEq2
     *
     * @return Paris
     */
    public function setCoteEq2($coteEq2)
    {
        $this->coteEq2 = $coteEq2;

        return $this;
    }

    /**
     * Get coteEq2
     *
     * @return float
     */
    public function getCoteEq2()
    {
        return $this->coteEq2;
    }

    /**
     * Set nomSport
     *
     * @param string $nomSport
     *
     * @return Paris
     */
    public function setNomSport($nomSport)
    {
        $this->nomSport = $nomSport;

        return $this;
    }

    /**
     * Get nomSport
     *
     * @return string
     */
    public function getNomSport()
    {
        return $this->nomSport;
    }


    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Paris
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set resultats
     *
     * @param \PEL\ParisBundle\Entity\Resultats $resultats
     *
     * @return Paris
     */
    public function setResultats(\PEL\ParisBundle\Entity\Resultats $resultats = null)
    {
        $this->resultats = $resultats;

        return $this;
    }

    /**
     * Get resultats
     *
     * @return \PEL\ParisBundle\Entity\Resultats
     */
    public function getResultats()
    {
        return $this->resultats;
    }

}
