<?php

namespace Dscorp\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DscorpUsuarioBundle:Default:index.html.twig', array('name' => $name));
    }
    public function pruebaAction()
    {
        return $this->render('DscorpUsuarioBundle:Prueba:prueba.html.twig', array());
    }
}
