<?php
namespace PEL\ParisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{

  public function indexAction()
  {
      
      $content = $this->get('templating')->render('PELParisBundle:Admin:Admin.html.twig',array('titre' => 'Page admin'));
                                                                             
    return new Response($content);
    }
}