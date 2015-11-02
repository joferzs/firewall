<?php
namespace Dscorp\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

use Symfony\Component\HttpFoundation\Request;

use Dscorp\UsuarioBundle\Entity\Usuario;
use Dscorp\UsuarioBundle\Form\UsuarioType;

use Dscorp\UsuarioBundle\Entity\Role;
use Dscorp\UsuarioBundle\Form\RoleType;

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

        $em = $this->getDoctrine()->getManager();
        $roll=$em->getRepository('DscorpUsuarioBundle:Role')->findAll();

        if (empty($roll)) {
            $entity  = new Role();
            $form = $this->createForm(new RoleType(), $entity);
            $form->bind($request);
            $entity->setNombreRole('ROLE_ADMIN');
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
        }elseif (count($roll)<=1){
            $entity  = new Role();
            $form = $this->createForm(new RoleType(), $entity);
            $form->bind($request);
            $entity->setNombreRole('ROLE_USER');
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
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

    public function create_loginAction(Request $request)
    {
        $entity  = new Usuario();
        $form = $this->createForm(new UsuarioType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            //establecemos la contraseña: --------------------------
            $this->setSecurePassword($entity);

            $em = $this->getDoctrine()->getManager();
            $def=$em->getRepository('DscorpUsuarioBundle:Usuario')->findAll();

            if (empty($def)) {
                $roles=$em->getRepository('DscorpUsuarioBundle:Role')->find(1);
                $entity->setUserRoles($roles);
                $entity->setStatus('t');
            }
            elseif (!empty($def)) {
                $roles=$em->getRepository('DscorpUsuarioBundle:Role')->find(2);
                $entity->setUserRoles($roles);
                $entity->setStatus('t');
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('login', array()));
        }

        return $this->render('DscorpUsuarioBundle:Security:login.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    private function setSecurePassword(&$entity) {
        $entity->setSalt(md5(time()));
        $encoder = new \Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder('sha512', true, 10);
        $password = $encoder->encodePassword($entity->getPassword(), $entity->getSalt());
        $entity->setPassword($password);
    }
}