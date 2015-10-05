<?php

namespace Dscorp\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Dscorp\AdminBundle\Entity\Imagenes;
use Dscorp\AdminBundle\Form\ImagenesType;

/**
 * Imagenes controller.
 *
 */
class ImagenesController extends Controller
{
    /**
     * Lists all Imagenes entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DscorpAdminBundle:Imagenes')->findAll();

        return $this->render('DscorpAdminBundle:Imagenes:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Imagenes entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpAdminBundle:Imagenes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Imagenes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DscorpAdminBundle:Imagenes:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Imagenes entity.
     *
     */
    public function newAction()
    {
        $entity = new Imagenes();
        $form   = $this->createForm(new ImagenesType(), $entity);

        return $this->render('DscorpAdminBundle:Imagenes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Imagenes entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Imagenes();
        $form = $this->createForm(new ImagenesType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('imagenes_show', array('id' => $entity->getId())));
        }

        return $this->render('DscorpAdminBundle:Imagenes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Imagenes entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpAdminBundle:Imagenes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Imagenes entity.');
        }

        $editForm = $this->createForm(new ImagenesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DscorpAdminBundle:Imagenes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Imagenes entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpAdminBundle:Imagenes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Imagenes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ImagenesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('imagenes_edit', array('id' => $id)));
        }

        return $this->render('DscorpAdminBundle:Imagenes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Imagenes entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DscorpAdminBundle:Imagenes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Imagenes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('imagenes'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
