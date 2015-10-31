<?php
namespace Dscorp\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

use Dscorp\UsuarioBundle\Entity\Usuario;
use Dscorp\UsuarioBundle\Form\UsuarioType;

class SecurityController extends Controller
{
	public function loginAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();

        // obtiene el error de inicio de sesión si lo hay
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        $entity = new Usuario();
        $form   = $this->createForm(new UsuarioType(), $entity);

        return $this->render(
            'DscorpUsuarioBundle:Security:login.html.twig',
            array(
                'entity' => $entity,
                'form'   => $form->createView(),
                // último nombre de usuario ingresado
                'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                'error'         => $error,
            )
        );
    }
}