<?php
namespace PEL\ParisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use PEL\ParisBundle\Form\ResultatsType;
use PEL\ParisBundle\Entity\Resultats;

class AdminResultatsController extends Controller
{

  public function indexAction(Request $request)
  {
      $repParis = $this->getDoctrine()->getManager()->getRepository('PELParisBundle:Paris');
      $repUsers = $this->getDoctrine()->getManager()->getRepository('PELParisBundle:Users');
      $repMise = $this->getDoctrine()->getManager()->getRepository('PEL\ParisBundle\Entity\Mise');
      $paris = $repParis->findBy(array('resultats' => null), array('date' => 'desc'));
      
      $r = new Resultats;
      $formRes = $this->get('form.factory')->create(ResultatsType::class, $r);
      if ($request->isMethod('POST') && $formRes->handleRequest($request)->isValid()) {
            $id = $request->request->get('id');
            $p = $repParis->find(array('id' => $id));
            
            $em = $this->getDoctrine()->getManager();
            $p->setResultats($r);
            $em->persist($p);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Resultats disponibles');
            $validGain = $this->service['pel_paris.calculgain'] = new \PEL\ParisBundle\Service\CalculGain($id, $em, $repUsers, $repMise);
            $validGain->valideGain();
            return $this->render('PELParisBundle:Admin:Admin.html.twig',array('titre' => 'Page admin',
                                                                              'formRes' => $formRes->createView())); 
     }
      $content = $this->get('templating')->render('PELParisBundle:Admin:AdminResultats.html.twig',array('titre' => 'Ajout resultats',
                                                                                                        'form' => $formRes->createView(),
                                                                                                        'paris' => $paris )); 
    return new Response($content);                                                                  
    }
    
    
}