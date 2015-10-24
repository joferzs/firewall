<?php

namespace Dscorp\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contenido
 */
class Contenido
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombreContenido;


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
     * Set nombreContenido
     *
     * @param string $nombreContenido
     * @return Contenido
     */
    public function setNombreContenido($nombreContenido)
    {
        $this->nombreContenido = $nombreContenido;
    
        return $this;
    }

    /**
     * Get nombreContenido
     *
     * @return string 
     */
    public function getNombreContenido()
    {
        return $this->nombreContenido;
    }
    /**
     * @var \Dscorp\AdminBundle\Entity\Subtema
     */
    private $subtema;


    /**
     * Set subtema
     *
     * @param \Dscorp\AdminBundle\Entity\Subtema $subtema
     * @return Contenido
     */
    public function setSubtema(\Dscorp\AdminBundle\Entity\Subtema $subtema = null)
    {
        $this->subtema = $subtema;
    
        return $this;
    }

    /**
     * Get subtema
     *
     * @return \Dscorp\AdminBundle\Entity\Subtema 
     */
    public function getSubtema()
    {
        return $this->subtema;
    }
    /**
     * @var \Dscorp\AdminBundle\Entity\Imagenes
     */
    private $imagenes;


    /**
     * Set imagenes
     *
     * @param \Dscorp\AdminBundle\Entity\Imagenes $imagenes
     * @return Contenido
     */
    public function setImagenes(\Dscorp\AdminBundle\Entity\Imagenes $imagenes = null)
    {
        $this->imagenes = $imagenes;

        return $this;
    }

    /**
     * Get imagenes
     *
     * @return \Dscorp\AdminBundle\Entity\Imagenes 
     */
    public function getImagenes()
    {
        return $this->imagenes;
    }
}
