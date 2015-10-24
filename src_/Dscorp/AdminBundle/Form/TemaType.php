<?php

namespace Dscorp\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TemaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreTema','text',array('label'=>'Nombre del tema:','attr' => array('class' => 'clasesilla')))
            ->add('idioma','entity',array('class' => 'DscorpAdminBundle:Idioma','label'=>'Idioma del tema','attr' => array('class' => 'chosen-select clasesilla')))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Dscorp\AdminBundle\Entity\Tema'
        ));
    }

    public function getName()
    {
        return 'dscorp_adminbundle_tematype';
    }
}
