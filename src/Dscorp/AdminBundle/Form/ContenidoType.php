<?php

namespace Dscorp\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContenidoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreContenido','text',array('label'=>'Ingrese el contenido','attr' => array('class' => 'clasesilla')))
            ->add('subtema','entity',array('class' => 'DscorpAdminBundle:Subtema','label'=>'Subtema','attr' => array('class' => 'chosen-select clasesilla')))
            ->add('imagenes','entity',array('class' => 'DscorpAdminBundle:Imagenes','label'=>'Imagen','attr' => array('class' => 'chosen-select clasesilla')))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Dscorp\AdminBundle\Entity\Contenido'
        ));
    }

    public function getName()
    {
        return 'dscorp_adminbundle_contenidotype';
    }
}
