<?php

namespace EspectaculosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use EspectaculosBundle\Entity\Sala;
use Symfony\Component\HttpFoundation\Request;

    /**
     * @Route("/salas")
     */
class SalaController extends Controller
{
    /**
     * @Route("/", name="index_salas")
     */
    public function indexAction()
    {
       
   	$salas = $this->getDoctrine()
    	->getRepository('EspectaculosBundle:Sala') ->findAll();


        return $this->render('EspectaculosBundle:Salas:index.html.twig', array('salas' => $salas));
   
    }


	/**
     * @Route("/new")
     */
    public function newAction(Request $request)
    {

		$sala = new Sala();
		$form = $this->createFormBuilder($sala)
		->add('nombre', 'text')
		->add('direccion', 'text')
		->add('telefono', 'text')
		->add('Guardar', 'submit')

		->getForm();

		$form->handleRequest($request);


		if ($form->isValid()) {

			// llevar a cabo alguna acción, como salvar el objeto en la base de datos
			$em = $this->getDoctrine()->getEntityManager();
			$em->persist($sala);
			$em->flush();
			return $this->redirect($this->generateUrl('index_salas'));
		}

		return $this->render('EspectaculosBundle:Salas:new.html.twig', 
			array('form' => $form->createView(),
		));
	}


}
