<?php

namespace Dscorp\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Idioma
 */
class Idioma
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombreIdioma;


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
     * Set nombreIdioma
     *
     * @param string $nombreIdioma
     * @return Idioma
     */
    public function setNombreIdioma($nombreIdioma)
    {
        $this->nombreIdioma = $nombreIdioma;

        return $this;
    }

    /**
     * Get nombreIdioma
     *
     * @return string 
     */
    public function getNombreIdioma()
    {
        return $this->nombreIdioma;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tema;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tema = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add tema
     *
     * @param \Dscorp\AdminBundle\Entity\Tema $tema
     * @return Idioma
     */
    public function addTema(\Dscorp\AdminBundle\Entity\Tema $tema)
    {
        $this->tema[] = $tema;

        return $this;
    }

    /**
     * Remove tema
     *
     * @param \Dscorp\AdminBundle\Entity\Tema $tema
     */
    public function removeTema(\Dscorp\AdminBundle\Entity\Tema $tema)
    {
        $this->tema->removeElement($tema);
    }

    /**
     * Get tema
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTema()
    {
        return $this->tema;
    }

    public function __toString(){
        return $this->nombreIdioma;
    }
}
