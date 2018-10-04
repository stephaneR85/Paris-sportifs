<?php

namespace PEL\ParisBundle\Repository;


class MiseRepository extends \Doctrine\ORM\EntityRepository
{
    public function findParis($idUser){
        
        $qb = $this->createQueryBuilder('m')
        ->Join('m.paris', 'p')
        ->Join('p.resultats', 'r' )
        ->addSelect('p')
        ->addSelect('r');
        $qb->where('m.id_user = :id')->setParameter('id', $idUser);
        
        return $qb->getQuery()->getResult();
  }
  
  
  public function findMise($idParis){
        
        $qb = $this->createQueryBuilder('m')
        ->Join('m.paris', 'p')
        ->Join('p.resultats', 'r' )
        ->addSelect('p')
        ->addSelect('r');
        $qb->where('p.id = :id')->setParameter('id', $idParis);
        
        return $qb->getQuery()->getResult();
  }
}
