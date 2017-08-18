<?php

namespace EspectaculosBundle\Controller;

use EspectaculosBundle\Entity\Espectador;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Espectador controller.
 *
 * @Route("espectador")
 */
class EspectadorController extends Controller
{
    /**
     * Lists all espectador entities.
     *
     * @Route("/", name="espectador_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $espectadors = $em->getRepository('EspectaculosBundle:Espectador')->findAll();

        return $this->render('espectador/index.html.twig', array(
            'espectadors' => $espectadors,
        ));
    }

    /**
     * Creates a new espectador entity.
     *
     * @Route("/new", name="espectador_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $espectador = new Espectador();
        $form = $this->createForm('EspectaculosBundle\Form\EspectadorType', $espectador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($espectador);
            $em->flush();

            return $this->redirectToRoute('espectador_show', array('id' => $espectador->getId()));
        }

        return $this->render('espectador/new.html.twig', array(
            'espectador' => $espectador,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a espectador entity.
     *
     * @Route("/{id}", name="espectador_show")
     * @Method("GET")
     */
    public function showAction(Espectador $espectador)
    {
        $deleteForm = $this->createDeleteForm($espectador);

        return $this->render('espectador/show.html.twig', array(
            'espectador' => $espectador,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing espectador entity.
     *
     * @Route("/{id}/edit", name="espectador_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Espectador $espectador)
    {
        $deleteForm = $this->createDeleteForm($espectador);
        $editForm = $this->createForm('EspectaculosBundle\Form\EspectadorType', $espectador);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('espectador_edit', array('id' => $espectador->getId()));
        }

        return $this->render('espectador/edit.html.twig', array(
            'espectador' => $espectador,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a espectador entity.
     *
     * @Route("/{id}", name="espectador_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Espectador $espectador)
    {
        $form = $this->createDeleteForm($espectador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($espectador);
            $em->flush();
        }

        return $this->redirectToRoute('espectador_index');
    }

    /**
     * Creates a form to delete a espectador entity.
     *
     * @param Espectador $espectador The espectador entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Espectador $espectador)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('espectador_delete', array('id' => $espectador->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
