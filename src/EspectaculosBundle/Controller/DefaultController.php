<?php

namespace EspectaculosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
       
    	$espectaculos = $this->getDoctrine()
    	->getRepository('EspectaculosBundle:Espectaculo') ->findAll();

        return $this->render('EspectaculosBundle:Default:index.html.twig', array('espectaculos => $espectaculos'));
    }
}
