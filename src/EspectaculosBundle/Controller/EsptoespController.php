<?php

namespace EspectaculosBundle\Controller;

use EspectaculosBundle\web\js\jquery;
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
/**    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $esptoesps = $em->getRepository('EspectaculosBundle:Esptoesp')->findAll();

        return $this->render('esptoesp/index.html.twig', array(
            'esptoesps' => $esptoesps,
        ));
    }

*/


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
        $cupo_rest=$espectaculo->getCuporest()-1;

        $esptoesp = new Esptoesp();
 
        $form = $this->createForm('EspectaculosBundle\Form\EsptoespType', $esptoesp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $esptoesp -> setEspectaculo ($espectaculo);

            $espectadorvacio = ($esptoesp->getEspectador());

            if(is_null($espectadorvacio)){
                $existe=(is_null($espectadorvacio));
            }else{
                $id_espectador = $esptoesp->getEspectador()->getId();

                $qb = $this->getDoctrine()->getManager()->createQueryBuilder('p');
                $qb->select('p')
                    ->from('EspectaculosBundle:Esptoesp','p');
                $qb->where('p.espectaculo = ?1') 
                   ->setParameter(1, $id_espectaculo);
                $qb->andwhere( 'p.espectador = ?2')
                   ->setParameter(2, $id_espectador);
                $queryres = $qb ->getQuery()->getResult();
                $existe=(count($queryres)>'0');
            }

           if (!$existe) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($esptoesp);
                $em->flush();
            }
            else { 
                echo '<script language="javascript">alert("El espectador ya existe");</script>';
            }


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
//        var_dump($espectaculo);
//        die;

//        $cupo_rest=$espectaculo->getCuporest()+1;


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
    public function listaAction(Espectaculo $espectaculo)
    {
#
        $id = $espectaculo->getId();
        $nombre=$espectaculo->getNombre();
        $restante=$espectaculo->getCuporest();
        $cupo=$espectaculo->getCupo();


        $qb = $this->getDoctrine()->getManager()->createQueryBuilder('p');
        $qb->select('p')
            ->from('EspectaculosBundle:Esptoesp','p');
        $qb->where('p.espectaculo = ?1') 
           ->setParameter(1, $id);

        $esptoesps = $qb ->getQuery()->getResult();

        $restante=$cupo - count($esptoesps);
        $em = $this->getDoctrine()->getManager();
        $espectaculo->setCuporest($restante);
        $em->persist($espectaculo);
        $em->flush();


        return $this->render('esptoesp/lista.html.twig', array(
            'esptoesps' => $esptoesps, 
            'nombre' => $nombre,
            'restante' => $restante,
            'idesp'=>$id,
        ));


    }

 

}
