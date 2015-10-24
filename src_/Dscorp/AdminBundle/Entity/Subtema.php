<?php

namespace Dscorp\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subtema
 */
class Subtema
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombreSub;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombreSub
     *
     * @param string $nombreSub
     * @return Subtema
     */
    public function setNombreSub($nombreSub)
    {
        $this->nombreSub = $nombreSub;
    
        return $this;
    }

    /**
     * Get nombreSub
     *
     * @return string 
     */
    public function getNombreSub()
    {
        return $this->nombreSub;
    }
    /**
     * @var \Dscorp\AdminBundle\Entity\Tema
     */
    private $tema;


    /**
     * Set tema
     *
     * @param \Dscorp\AdminBundle\Entity\Tema $tema
     * @return Subtema
     */
    public function setTema(\Dscorp\AdminBundle\Entity\Tema $tema = null)
    {
        $this->tema = $tema;
    
        return $this;
    }

    /**
     * Get tema
     *
     * @return \Dscorp\AdminBundle\Entity\Tema 
     */
    public function getTema()
    {
        return $this->tema;
    }

    public function __toString(){
       return $this->nombreSub; 
    }
    /**
     * @var \Dscorp\AdminBundle\Entity\Contenido
     */
    private $contenido;


    /**
     * Set contenido
     *
     * @param \Dscorp\AdminBundle\Entity\Contenido $contenido
     * @return Subtema
     */
    public function setContenido(\Dscorp\AdminBundle\Entity\Contenido $contenido = null)
    {
        $this->contenido = $contenido;
    
        return $this;
    }

    /**
     * Get contenido
     *
     * @return \Dscorp\AdminBundle\Entity\Contenido 
     */
    public function getContenido()
    {
        return $this->contenido;
    }
}
