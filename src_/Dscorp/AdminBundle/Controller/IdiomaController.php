<?php

namespace Dscorp\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Dscorp\AdminBundle\Entity\Idioma;
use Dscorp\AdminBundle\Form\IdiomaType;

/**
 * Idioma controller.
 *
 */
class IdiomaController extends Controller
{
    /**
     * Lists all Idioma entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DscorpAdminBundle:Idioma')->findAll();

        return $this->render('DscorpAdminBundle:Idioma:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Idioma entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpAdminBundle:Idioma')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Idioma entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DscorpAdminBundle:Idioma:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Idioma entity.
     *
     */
    public function newAction()
    {
        $entity = new Idioma();
        $form   = $this->createForm(new IdiomaType(), $entity);

        return $this->render('DscorpAdminBundle:Idioma:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Idioma entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Idioma();
        $form = $this->createForm(new IdiomaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('idioma_show', array('id' => $entity->getId())));
        }

        return $this->render('DscorpAdminBundle:Idioma:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Idioma entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpAdminBundle:Idioma')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Idioma entity.');
        }

        $editForm = $this->createForm(new IdiomaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DscorpAdminBundle:Idioma:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Idioma entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpAdminBundle:Idioma')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Idioma entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new IdiomaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('idioma_edit', array('id' => $id)));
        }

        return $this->render('DscorpAdminBundle:Idioma:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Idioma entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DscorpAdminBundle:Idioma')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Idioma entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('idioma'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
