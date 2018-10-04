<?php
namespace PEL\ParisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use PEL\ParisBundle\Entity\Paris;

class AccueilController extends Controller
{
  public function indexAction()
  {
      $em = $this->getDoctrine()->getManager()->getRepository('PEL\ParisBundle\Entity\Paris');
      $sport = $em->myfind();
      $content = $this->get('templating')->render('PELParisBundle:Accueil:Index.html.twig', array('titre' => 'Accueil',
                                                                                                  'sport' => $sport)); 
      return new Response($content);
  }
  
}
?>