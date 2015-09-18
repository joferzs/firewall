<?php

namespace Dscorp\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Dscorp\AdminBundle\Entity\Subtema;
use Dscorp\AdminBundle\Form\SubtemaType;

/**
 * Subtema controller.
 *
 */
class SubtemaController extends Controller
{
    /**
     * Lists all Subtema entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DscorpAdminBundle:Subtema')->findAll();

        return $this->render('DscorpAdminBundle:Subtema:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Subtema entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpAdminBundle:Subtema')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Subtema entity.');
        }

        //$tema = $em->getRepository('DscorpAdminBundle:Tema')->find($id);

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DscorpAdminBundle:Subtema:show.html.twig', array(
            'entity'      => $entity,
            //'entityTema'   => $tema,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Subtema entity.
     *
     */
    public function newAction()
    {
        $entity = new Subtema();
        $form   = $this->createForm(new SubtemaType(), $entity);

        return $this->render('DscorpAdminBundle:Subtema:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Subtema entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Subtema();
        $form = $this->createForm(new SubtemaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('subtema_show', array('id' => $entity->getId())));
        }

        return $this->render('DscorpAdminBundle:Subtema:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Subtema entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpAdminBundle:Subtema')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Subtema entity.');
        }

        $editForm = $this->createForm(new SubtemaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DscorpAdminBundle:Subtema:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Subtema entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpAdminBundle:Subtema')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Subtema entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SubtemaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('subtema_edit', array('id' => $id)));
        }

        return $this->render('DscorpAdminBundle:Subtema:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Subtema entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DscorpAdminBundle:Subtema')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Subtema entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('subtema'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
