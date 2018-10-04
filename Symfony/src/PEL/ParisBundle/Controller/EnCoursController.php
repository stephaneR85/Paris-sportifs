<?php
namespace PEL\ParisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use PEL\ParisBundle\Form\MiseType;
use PEL\ParisBundle\Entity\Mise;
use PEL\ParisBundle\Entity\Paris;

class EnCoursController extends Controller
{
    public $nomSport;
    
  public function indexAction($nomSport, Request $request)
  {
      $repository = $this->getDoctrine()->getManager()->getRepository('PELParisBundle:Paris');
      $paris = $repository->findBy(array('nomSport' => $nomSport, 'resultats' => null), array('date' => 'desc'));
      
      $mise = new Mise;
      $form = $this->get('form.factory')->create(MiseType::class, $mise);
      if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $id = $request->request->get('id');
            $p = $repository->find(array('id' => $id));
            $mise->setParis($p);
            $em = $this->getDoctrine()->getManager();
            
            $mi = $form->getData()->getMise();
            $id_user = $form->getData()->getIdUser();
            
            $repUser = $this->getDoctrine()->getManager()->getRepository('PELParisBundle:Users');
            $user = $repUser->findOneBy(array('id' => $id_user));
           
            $retrait = $user->getSolde()-$mi;
            $user->setSolde($retrait);
            if($retrait > 0){
                $em->persist($user);
                $em->persist($mise);
                $em->flush();
                $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
                return $this->render('PELParisBundle:EnCours:EnCours.html.twig',array('nomSport' => $nomSport, 
                                                                                  'titre' => 'Paris en cours',
                                                                                  'paris' => $paris,
                                                                                   'form' => $form->createView()
                                                                                   )); 
            }
            else{
                    $affiche = "Mise trop élevée";
                     return $this->render('PELParisBundle:EnCours:EnCours.html.twig',array('nomSport' => $nomSport, 
                                                                                  'titre' => 'Paris en cours',
                                                                                  'paris' => $paris,
                                                                                   'form' => $form->createView(),
                                                                                    'affiche' => $affiche)); 
            }
      }
  
      $content = $this->get('templating')->render('PELParisBundle:EnCours:EnCours.html.twig',array('nomSport' => $nomSport, 
                                                                                                   'titre' => 'Paris en cours',
                                                                                                   'paris' => $paris, 
                                                                                                   'form' => $form->createView())); 
    return new Response($content);
  }
}