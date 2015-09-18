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

    	$entities = $em->getRepository('DscorpAdminBundle:Contenido')->findAll();

        return $this->render('VistaBundle:Vista:index.html.twig', array(
        	'entities' => $entities,
        ));      
    }
}
