<?php

namespace EspectaculosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {
       
  #  	$espectaculos = $this->getDoctrine()
 #   	->getRepository('EspectaculosBundle:Espectaculo') ->findAll();

    	$form = $this->createFormBuilder()
    		->setMethod('GET')
    		->add('nombre', 'text')
      		->add('sala', 'text')
      		->add('tipo', 'text')
      		->add('fecha', 'date')
    		->add('Filtrar', 'submit')
  		
    		->getForm();

    	$qb = $this->getDoctrine()->getManager()->createQueryBuilder('p');
    	$qb->select('p')
    		->from('EspectaculosBundle:Espectaculo','p');


    	$form->handleRequest($request);
    	if ($form->isValid()) {
    		$criteria = $form->getData();

    		$qb->where( $qb->expr()->like('p.nombre', '?1')) 
    	    			   ->setParameter(1, '%' . $criteria['nombre'] . '%')
    	    	 and ( $qb->expr()->like('p.sala', '?2'))
    	    	 and ( $qb->expr()->like('p.tipo', '?3'))
    	    	 and ( $qb->expr()->like('p.fecha', '?4'));

    	}	

    	$espectaculo = $qb ->getQuery()->getResult();

        return $this->render('EspectaculosBundle:Default:index.html.twig', array('espectaculos' => $espectaculo, 'form' => $form->createView()));
    }


}
