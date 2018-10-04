<?php
  
namespace PEL\ParisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="PEL\ParisBundle\Repository\UsersRepository")
 */
class Users extends BaseUser
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;   
    
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
     * @var int
     *
     * @ORM\Column(name="solde", type="integer", nullable=true)
     */
    private $solde;
    

    /**
     * Set solde
     *
     * @param integer $solde
     *
     * @return Users
     */
    public function setSolde($solde)
    {
        $this->solde = $solde;

        return $this;
    }

    /**
     * Get solde
     *
     * @return integer
     */
    public function getSolde()
    {
        return $this->solde;
    }
}
