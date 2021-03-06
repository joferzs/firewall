<?php

namespace Dscorp\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ImagenesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreImagen','text',array('label'=>'Nombre de la imagen:','attr' => array('class' => 'clasesilla')))
            ->add('imagen','file',array('label'=>'Agregar imagen:'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Dscorp\AdminBundle\Entity\Imagenes'
        ));
    }

    public function getName()
    {
        return 'dscorp_adminbundle_imagenestype';
    }
}
