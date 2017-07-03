<?php

namespace EspectaculosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
   public function indexAction(Request $request)
    {
       
  #  	$espectaculos = $this->getDoctrine()
  #  	->getRepository('EspectaculosBundle:Espectaculo') ->findAll();


    	$form = $this->createFormBuilder()
    		->setMethod('GET')
    		->add('nombre', 'text', array('required' => false))

       	->add('sala',  'entity', array(
                 'property'=>'nombre',
                'class' => 'EspectaculosBundle:Sala',
                'placeholder' => 'seleccionar',
                'empty_value' => 0,
                'required' => false
            ))
 
      	->add('tipo', 'entity', array(
                 'property'=>'nombre',
                'class' => 'EspectaculosBundle:TipoEspectaculos',
                'placeholder' => 'seleccionar',
                'empty_value' => 0,
                'required' => false
            ))
      	->add('fecha', 'date')

    		->add('Filtrar', 'submit')
  		
    		->getForm();

    	$qb = $this->getDoctrine()->getManager()->createQueryBuilder('p');
    	$qb->select('p')
    		->from('EspectaculosBundle:Espectaculo','p');


    	$form->handleRequest($request);
    	if ($form->isValid()) {
    		$criteria = $form->getData();
        $qb->where('1=1');
    		
        if ($criteria['nombre']){
          $qb->andwhere( $qb->expr()->like('p.nombre', '?1'))
          ->setParameter(1, $criteria['nombre']);
        }
        if ($criteria['sala']){
          $qb->andwhere( 'p.sala = ?2')
          ->setParameter(2, $criteria['sala']);
        }

        if ($criteria['tipo']){
          $qb->andwhere( 'p.tipo = ?3')
          ->setParameter(3, $criteria['tipo']);
        }

        if ($criteria['fecha']){
          $qb->andwhere( 'p.fecha = ?4')
          ->setParameter(4, $criteria['fecha']);
        }


        //$qb->andwhere( $qb->expr()->like('p.tipo', '?3'))
        
        //$qb->andwhere( $qb->expr()-> gt('p.fecha', '?4'))) //> \"2017-01-01\" 
                          


    	}	

    	$espectaculo = $qb ->getQuery()->getResult();

        return $this->render('EspectaculosBundle:Default:index.html.twig', array('espectaculos' => $espectaculo, 'form' => $form->createView()));
    }

/**
     * Finds and displays a espectaculo entity.
     *
     * @Route("/mostrar-{id}", name="espectaculo_show")
     * @Method("GET")
     */
/**   public function showAction(Espectaculo $espectaculo)
    {
//        $deleteForm = $this->createDeleteForm($espectaculo);

        return $this->render('espectaculo/mostrar.html.twig', array(
            'espectaculo' => $espectaculo,
            'delete_form' => $deleteForm->createView(),
        ));
    }
*/

}

