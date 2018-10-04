<?php

namespace PEL\ParisBundle\Service;

class CalculGain{
    
    private $id;
    private $em;
    private $repUsers;
    private $repMise;
    
    public function __construct($id, $em, $repUsers, $repMise){
        $this->id = $id;
        $this->em = $em;
        $this->repUsers = $repUsers;
        $this->repMise = $repMise;
}
    
    function valideGain(){

        $mise = $this->repMise->findMise($this->id);
        $gain = 0;
        foreach($mise as $m){
            $user = $this->repUsers->findOneBy(array('id' => $m->getIdUser()));
            if($m->getScoreEq1() == $m->getParis()->getResultats()->getScoreEq1() && $m->getScoreEq2() == $m->getParis()->getResultats()->getScoreEq2()){
                $gain = 3 * $m->getMise();
                $m->setGain($gain);
                $user->setSolde($user->getSolde() + $gain);
                $this->em->persist($user);
                $this->em->persist($m);
                $this->em->flush();
            }
            else{
                if($m->getScoreEq1() < $m->getScoreEq2()){
                    if($m->getParis()->getResultats()->getScoreEq1() < $m->getParis()->getResultats()->getScoreEq2()){
                        $gain = $m->getParis()->getCoteEq2() * $m->getMise();
                        $m->setGain($gain);
                        $user->setSolde($user->getSolde() + $gain);
                        $this->em->persist($user);
                        $this->em->persist($m);
                        $this->em->flush();
                    }
                }
                if($m->getScoreEq1() > $m->getScoreEq2()){
                    if($m->getParis()->getResultats()->getScoreEq1() > $m->getParis()->getResultats()->getScoreEq2()){
                        $gain = $m->getParis()->getCoteEq1() * $m->getMise();
                        $m->setGain($gain);
                        $user->setSolde($user->getSolde() + $gain);
                        $this->em->persist($user);
                        $this->em->persist($m);
                        $this->em->flush();
                    }
                }
                if($m->getScoreEq1() == $m->getScoreEq2()){
                    if($m->getParis()->getResultats()->getScoreEq1() == $m->getParis()->getResultats()->getScoreEq2()){
                        $gain = max($m->getParis()->getCoteEq2(), $m->getParis()->getCoteEq1()) * $m->getMise();
                        $m->setGain($gain);
                        $user->setSolde($user->getSolde() + $gain);
                        $this->em->persist($user);
                        $this->em->persist($m);
                        $this->em->flush();
                    }
                }
                else{
                    $m->setGain($gain);
                    $this->em->persist($m);
                    $this->em->flush();
                }
            }
        }
        return $gain;
    }  
}

?>
