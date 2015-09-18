<?php

namespace Dscorp\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Dscorp\AdminBundle\Entity\Tema;
use Dscorp\AdminBundle\Form\TemaType;

/**
 * Tema controller.
 *
 */
class TemaController extends Controller
{
    /**
     * Lists all Tema entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DscorpAdminBundle:Tema')->findAll();

        return $this->render('DscorpAdminBundle:Tema:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Tema entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpAdminBundle:Tema')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tema entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DscorpAdminBundle:Tema:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Tema entity.
     *
     */
    public function newAction()
    {
        $entity = new Tema();
        $form   = $this->createForm(new TemaType(), $entity);

        return $this->render('DscorpAdminBundle:Tema:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Tema entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Tema();
        $form = $this->createForm(new TemaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tema_show', array('id' => $entity->getId())));
        }

        return $this->render('DscorpAdminBundle:Tema:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Tema entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpAdminBundle:Tema')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tema entity.');
        }

        $editForm = $this->createForm(new TemaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DscorpAdminBundle:Tema:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Tema entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpAdminBundle:Tema')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tema entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TemaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tema_edit', array('id' => $id)));
        }

        return $this->render('DscorpAdminBundle:Tema:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Tema entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DscorpAdminBundle:Tema')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tema entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tema'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
