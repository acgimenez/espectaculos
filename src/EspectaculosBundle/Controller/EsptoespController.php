<?php

namespace EspectaculosBundle\Controller;

use EspectaculosBundle\Entity\Esptoesp;
use EspectaculosBundle\Entity\Espectaculo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * Esptoesp controller.
 *
 * @Route("esptoesp")
 */
class EsptoespController extends Controller
{

#        $em = $this->getDoctrine()->getManager();
#        $esptoesps = $em->getRepository('EspectaculosBundle:Esptoesp')->findAll();

    /**
     * Lists all esptoesp entities.
     *
     * @Route("/", name="esptoesp_index")
     * @Method("GET")
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $esptoesps = $em->getRepository('EspectaculosBundle:Esptoesp')->findAll();

        return $this->render('esptoesp/index.html.twig', array(
            'esptoesps' => $esptoesps,
        ));
    }

    /**
     * Creates a new esptoesp entity.
     *
     * @Route("/{id}/new", name="esptoesp_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, Espectaculo $espectaculo)
    {
        $id_espectaculo = $espectaculo->getId();
        $nombre_espectaculo=$espectaculo->getNombre();
 
        $esptoesp = new Esptoesp();

       $form = $this->createForm('EspectaculosBundle\Form\EsptoespType', $esptoesp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $esptoesp -> setEspectaculo ($espectaculo);
            $em = $this->getDoctrine()->getManager();
            $em->persist($esptoesp);
            $em->flush();

            return $this->redirectToRoute('esptoesp_lista', array("id" => $id_espectaculo));
        }


        return $this->render('esptoesp/new.html.twig', array(
            'esptoesp' => $esptoesp,
            'form' => $form->createView(),
            'nombre_espectaculo'=>$nombre_espectaculo,
            'id_espectaculo'=>$id_espectaculo,
        ));

    }

    /**
     * Finds and displays a esptoesp entity.
     *
     * @Route("/{id}", name="esptoesp_show")
     * @Method("GET")
     */
    public function showAction(Esptoesp $esptoesp)
    {
        $deleteForm = $this->createDeleteForm($esptoesp);
        
        $id_espectaculo = $esptoesp->getEspectaculo()->getId();
        
        return $this->render('esptoesp/show.html.twig', array(
            'esptoesp' => $esptoesp,
            'delete_form' => $deleteForm->createView(),
            'espectaculo'=> $id_espectaculo,
        ));




    }

    /**
     * Displays a form to edit an existing esptoesp entity.
     *
     * @Route("/{id}/edit", name="esptoesp_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Esptoesp $esptoesp)
    {
        $deleteForm = $this->createDeleteForm($esptoesp);
        $editForm = $this->createForm('EspectaculosBundle\Form\EsptoespType', $esptoesp);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('esptoesp_edit', array('id' => $esptoesp->getId()));
        }

        return $this->render('esptoesp/edit.html.twig', array(
            'esptoesp' => $esptoesp,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a esptoesp entity.
     *
     * @Route("/{id}", name="esptoesp_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Esptoesp $esptoesp)
    {
        $id_espectaculo = $esptoesp->getEspectaculo()->getId();

        $form = $this->createDeleteForm($esptoesp);
        $form->handleRequest($request);

        
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($esptoesp);
            $em->flush();
        }
        
        return $this->redirectToRoute('esptoesp_lista', array("id" => $id_espectaculo));
    }

    /**
     * Creates a form to delete a esptoesp entity.
     *
     * @param Esptoesp $esptoesp The esptoesp entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Esptoesp $esptoesp)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('esptoesp_delete', array('id' => $esptoesp->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Lists all esptoesp entities.
     *
     * @Route("/esp/lista/{id}", name="esptoesp_lista")
     * @Method("GET")
     */
    public function listaAction(Espectaculo $ale)
    {
#
        $id = $ale->getId();
        $nombre=$ale->getNombre();
        $restante=$ale->getCuporest();


  #      var_dump($nombre);

   #     die();
        
 #       $ale=$id;
 #      $em = $this->getDoctrine()->getManager();
 #      $esptoesps = $em->getRepository('EspectaculosBundle:Esptoesp')->findAll();

        $qb = $this->getDoctrine()->getManager()->createQueryBuilder('p');
        $qb->select('p')
            ->from('EspectaculosBundle:Esptoesp','p');

        $qb->where('p.espectaculo = ?1') 
           ->setParameter(1, $id);

#        $qb->where( $qb->expr()->like('p.espectaculo', ?1'))  
#           ->setParameter(1, $ale);


        $esptoesps = $qb ->getQuery()->getResult();

        return $this->render('esptoesp/lista.html.twig', array(
            'esptoesps' => $esptoesps, 
            'nombre' => $nombre,
            'restante' => $restante,
            'idesp'=>$id,
        ));


//        return $this->render('EspectaculosBundle:Default:listaespectadores.html.twig', array(
//            'esptoesps' => $esptoesps, 
//        ));
    }

 

}
