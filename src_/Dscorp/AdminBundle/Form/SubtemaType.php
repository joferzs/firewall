<?php

namespace Dscorp\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SubtemaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreSub','text',array('label'=>'Nombre del subtema:','attr' => array('class' => 'clasesilla')))
            ->add('tema','entity',array('class' => 'DscorpAdminBundle:Tema','label'=>'Tema','attr' => array('class' => 'chosen-select clasesilla')))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Dscorp\AdminBundle\Entity\Subtema'
        ));
    }

    public function getName()
    {
        return 'dscorp_adminbundle_subtematype';
    }
}
