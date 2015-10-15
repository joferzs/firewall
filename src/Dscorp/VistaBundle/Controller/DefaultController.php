<?php

namespace Dscorp\VistaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VistaBundle:Default:index.html.twig', array());
    }

    public function vistaAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entitiesTema = $em->getRepository('DscorpAdminBundle:Tema')->findAll();
        $entitiesSubtema = $em->getRepository('DscorpAdminBundle:Subtema')->findAll();
        $entitiesContenido = $em->getRepository('DscorpAdminBundle:Contenido')->findAll();
        $entitiesImagen = $em->getRepository('DscorpAdminBundle:Imagenes')->findAll();
        $entitiesIdioma = $em->getRepository('DscorpAdminBundle:Idioma')->findAll();
        $id='es';

        return $this->render('VistaBundle:Vista:index.html.twig', array(
            'entitiesContenido' => $entitiesContenido,
            'entitiesTema' => $entitiesTema,
            'entitiesImagen' => $entitiesImagen,
            'entitiesIdioma' => $entitiesIdioma,
            'entitiesSubtema' => $entitiesSubtema,
            'id' => $id
        ));      
    }

    public function lenguajeAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entitiesTema = $em->getRepository('DscorpAdminBundle:Tema')->findAll();
        $entitiesSubtema = $em->getRepository('DscorpAdminBundle:Subtema')->findAll();
        $entitiesContenido = $em->getRepository('DscorpAdminBundle:Contenido')->findAll();
        $entitiesImagen = $em->getRepository('DscorpAdminBundle:Imagenes')->findAll();
        $entitiesIdioma = $em->getRepository('DscorpAdminBundle:Idioma')->findAll();

        return $this->render('VistaBundle:Vista:index.html.twig', array(
            'entitiesContenido' => $entitiesContenido,
            'entitiesTema' => $entitiesTema,
            'entitiesImagen' => $entitiesImagen,
            'entitiesIdioma' => $entitiesIdioma,
            'entitiesSubtema' => $entitiesSubtema,
            'id' => $id
        ));      
    }
}
