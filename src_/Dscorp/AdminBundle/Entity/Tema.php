<?php

namespace Dscorp\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tema
 */
class Tema
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombreTema;


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
     * Set nombreTema
     *
     * @param string $nombreTema
     * @return Tema
     */
    public function setNombreTema($nombreTema)
    {
        $this->nombreTema = $nombreTema;
    
        return $this;
    }

    /**
     * Get nombreTema
     *
     * @return string 
     */
    public function getNombreTema()
    {
        return $this->nombreTema;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $subtema;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->subtema = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add subtema
     *
     * @param \Dscorp\AdminBundle\Entity\subtema $subtema
     * @return Tema
     */
    public function addSubtema(\Dscorp\AdminBundle\Entity\Subtema $subtema)
    {
        $this->subtema[] = $subtema;
    
        return $this;
    }

    /**
     * Remove subtema
     *
     * @param \Dscorp\AdminBundle\Entity\subtema $subtema
     */
    public function removeSubtema(\Dscorp\AdminBundle\Entity\Subtema $subtema)
    {
        $this->subtema->removeElement($subtema);
    }

    /**
     * Get subtema
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubtema()
    {
        return $this->subtema;
    }

    public function __toString(){
        return $this->nombreTema;
    }
    /**
     * @var \Dscorp\AdminBundle\Entity\Idioma
     */
    private $idioma;


    /**
     * Set idioma
     *
     * @param \Dscorp\AdminBundle\Entity\Idioma $idioma
     * @return Tema
     */
    public function setIdioma(\Dscorp\AdminBundle\Entity\Idioma $idioma = null)
    {
        $this->idioma = $idioma;

        return $this;
    }

    /**
     * Get idioma
     *
     * @return \Dscorp\AdminBundle\Entity\Idioma 
     */
    public function getIdioma()
    {
        return $this->idioma;
    }
}
