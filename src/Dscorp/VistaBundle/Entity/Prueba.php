<?php

namespace Dscorp\VistaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prueba
 */
class Prueba
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $prueba;


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
     * Set prueba
     *
     * @param string $prueba
     * @return Prueba
     */
    public function setPrueba($prueba)
    {
        $this->prueba = $prueba;
    
        return $this;
    }

    /**
     * Get prueba
     *
     * @return string 
     */
    public function getPrueba()
    {
        return $this->prueba;
    }
}
