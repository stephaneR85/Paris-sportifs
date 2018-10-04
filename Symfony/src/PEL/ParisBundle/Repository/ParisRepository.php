<?php

namespace PEL\ParisBundle\Repository;

class ParisRepository extends \Doctrine\ORM\EntityRepository

{
  public function myFind()
  {
      return $this->_em->createQuery('SELECT DISTINCT p.nomSport FROM PELParisBundle:Paris p')
                    ->getResult();
  }
  
}