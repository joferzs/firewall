<?php

namespace Dscorp\UsuarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre','text',array('label'=> ' ' ,'attr' => array(
                'class' => 'form-control regist','placeholder' => 'Nombre','name' => 'name',
                'ng-model' => 'formData.name','required' => ' ',
                'ng-class' => '{ error: exampleForm.name.$invalid && !exampleForm.$pristine }')))
            ->add('email','email',array('label' => ' ','attr' => array(
                'class' => 'form-control regist','placeholder' => 'example@email.com','name' => 'email',
                'ng-model' => 'formData.email','required' => ' ',
                'ng-class' => '{ error: exampleForm.email.$invalid && !exampleForm.$pristine }')))
            //->add('salt')
            ->add('password','password',array('label' => ' ','attr' => array(
                'class' => 'form-control regist','placeholder' => 'Password','name' => 'password',
                'ng-model' => 'formData.password','required' => ' ',
                'ng-class' => '{ error: exampleForm.password.$invalid && !exampleForm.$pristine }')))
            /*->add('status','checkbox',array('label' => 'Activar:','attr' => array(
                'class' => 'form-control regist','name' => 'check',
                'ng-model' => 'formData.check','required' => ' ',
                'ng-class' => '{ error: exampleForm.check.$invalid && !exampleForm.$pristine }')))*/
            //->add('user_roles')
        ;
    }

    public function getName()
    {
        return 'formLogin';
    }
}
