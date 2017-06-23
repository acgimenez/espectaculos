<?php

namespace EspectaculosBundle\Controller;

use EspectaculosBundle\Entity\TipoEspectaculos;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Tipoespectaculo controller.
 *
 * @Route("tipoespectaculos")
 */
class TipoEspectaculosController extends Controller
{
    /**
     * Lists all tipoEspectaculo entities.
     *
     * @Route("/", name="tipoespectaculos_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tipoEspectaculos = $em->getRepository('EspectaculosBundle:TipoEspectaculos')->findAll();

        return $this->render('tipoespectaculos/index.html.twig', array(
            'tipoEspectaculos' => $tipoEspectaculos,
        ));
    }

    /**
     * Creates a new tipoEspectaculo entity.
     *
     * @Route("/new", name="tipoespectaculos_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tipoEspectaculo = new Tipoespectaculos();
        $form = $this->createForm('EspectaculosBundle\Form\TipoEspectaculosType', $tipoEspectaculo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipoEspectaculo);
            $em->flush();

            return $this->redirectToRoute('tipoespectaculos_show', array('id' => $tipoEspectaculo->getId()));
        }

        return $this->render('tipoespectaculos/new.html.twig', array(
            'tipoEspectaculo' => $tipoEspectaculo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tipoEspectaculo entity.
     *
     * @Route("/{id}", name="tipoespectaculos_show")
     * @Method("GET")
     */
    public function showAction(TipoEspectaculos $tipoEspectaculo)
    {
        $deleteForm = $this->createDeleteForm($tipoEspectaculo);

        return $this->render('tipoespectaculos/show.html.twig', array(
            'tipoEspectaculo' => $tipoEspectaculo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tipoEspectaculo entity.
     *
     * @Route("/{id}/edit", name="tipoespectaculos_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TipoEspectaculos $tipoEspectaculo)
    {
        $deleteForm = $this->createDeleteForm($tipoEspectaculo);
        $editForm = $this->createForm('EspectaculosBundle\Form\TipoEspectaculosType', $tipoEspectaculo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tipoespectaculos_edit', array('id' => $tipoEspectaculo->getId()));
        }

        return $this->render('tipoespectaculos/edit.html.twig', array(
            'tipoEspectaculo' => $tipoEspectaculo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tipoEspectaculo entity.
     *
     * @Route("/{id}", name="tipoespectaculos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TipoEspectaculos $tipoEspectaculo)
    {
        $form = $this->createDeleteForm($tipoEspectaculo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tipoEspectaculo);
            $em->flush();
        }

        return $this->redirectToRoute('tipoespectaculos_index');
    }

    /**
     * Creates a form to delete a tipoEspectaculo entity.
     *
     * @param TipoEspectaculos $tipoEspectaculo The tipoEspectaculo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TipoEspectaculos $tipoEspectaculo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipoespectaculos_delete', array('id' => $tipoEspectaculo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
