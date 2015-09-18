<?php

namespace Dscorp\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Dscorp\AdminBundle\Entity\Contenido;
use Dscorp\AdminBundle\Form\ContenidoType;

/**
 * Contenido controller.
 *
 */
class ContenidoController extends Controller
{
    /**
     * Lists all Contenido entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DscorpAdminBundle:Contenido')->findAll();

        return $this->render('DscorpAdminBundle:Contenido:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Contenido entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpAdminBundle:Contenido')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contenido entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DscorpAdminBundle:Contenido:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Contenido entity.
     *
     */
    public function newAction()
    {
        $entity = new Contenido();
        $form   = $this->createForm(new ContenidoType(), $entity);

        return $this->render('DscorpAdminBundle:Contenido:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Contenido entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Contenido();
        $form = $this->createForm(new ContenidoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contenido_show', array('id' => $entity->getId())));
        }

        return $this->render('DscorpAdminBundle:Contenido:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Contenido entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpAdminBundle:Contenido')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contenido entity.');
        }

        $editForm = $this->createForm(new ContenidoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DscorpAdminBundle:Contenido:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Contenido entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpAdminBundle:Contenido')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contenido entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ContenidoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contenido_edit', array('id' => $id)));
        }

        return $this->render('DscorpAdminBundle:Contenido:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Contenido entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DscorpAdminBundle:Contenido')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Contenido entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('contenido'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
