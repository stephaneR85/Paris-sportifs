<?php
namespace PEL\ParisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ClientController extends Controller
{
 
  public function indexAction(Request $request)
  {
      $id_user = $this->getUser()->getId();
      $em = $this->getDoctrine()->getManager()->getRepository('PEL\ParisBundle\Entity\Mise');
      $paris = $em->findParis($id_user);
      $parisEnCours = $em->findBy(array('id_user'=> $id_user, 'gain' => null));
      
      $em2 = $this->getDoctrine()->getManager()->getRepository('PEL\ParisBundle\Entity\Users');
      $user = $em2->findOneBy(array('id' => $id_user));
  
      $content = $this->get('templating')->render('PELParisBundle:Client:Client.html.twig',array('titre' => 'Page client',                                                                         
                                                                                                   'paris' => $paris,
                                                                                                    'parisEnCours' =>$parisEnCours,
                                                                                                    'user' => $user));                                                                                    
      return new Response($content);
  }
  
  public function afficheGain($gain){
      return $gain;
  }
  
}