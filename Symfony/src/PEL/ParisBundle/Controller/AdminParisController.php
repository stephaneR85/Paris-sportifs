<?php
namespace PEL\ParisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use PEL\ParisBundle\Form\ParisType;
use PEL\ParisBundle\Entity\Paris;

class AdminParisController extends Controller
{

  public function indexAction(Request $request)
  {
      $p = new Paris;
      $formParis = $this->get('form.factory')->create(ParisType::class, $p);
      if ($request->isMethod('POST') && $formParis->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($p);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Paris lancé.');
            return $this->render('PELParisBundle:Admin:Admin.html.twig',array('titre' => 'Page Admin')); 
     }
      $content = $this->get('templating')->render('PELParisBundle:Admin:AdminParis.html.twig',array('titre' => 'Ajout Paris',
                                                                                  'formParis' => $formParis->createView())); 
    return new Response($content);
    }
}