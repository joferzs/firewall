<?php

namespace Dscorp\VistaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IncludeController extends Controller
{
    public function headerAction()
    {
        return $this->render('VistaBundle:Include:header.html.twig', array());
    }

    public function sidebarAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entitiesTema = $em->getRepository('DscorpAdminBundle:Tema')->findAll();
        $entitiesSubtema = $em->getRepository('DscorpAdminBundle:Subtema')->findAll();

        return $this->render('VistaBundle:Include:sidebar.html.twig', array(
            'entitiesTema' => $entitiesTema,
            'entitiesSubtema' => $entitiesSubtema,
        ));
    }

    public function footerAction()
    {
        return $this->render('VistaBundle:Include:footer.html.twig', array());
    }

    public function contentAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DscorpAdminBundle:Contenido')->findAll();

        if (!$entities) {
            throw $this->createNotFoundException('Unable to find contenido entity.');
        }

        echo "<br>id controladorr: ".$id;

        return $this->render('VistaBundle:Include:content.html.twig',array(
            'id'=>$id,
            'entities'=>$entities        
        ));   
        
    }
}
