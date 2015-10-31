<?php

namespace Dscorp\UsuarioBundle\Entity;

use Symfony\Component\Security\Core\Role\RoleInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 */
class Role implements RoleInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombreRole;


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
     * Set nombreRole
     *
     * @param string $nombreRole
     * @return Role
     */
    public function setNombreRole($nombreRole)
    {
        $this->nombreRole = $nombreRole;

        return $this;
    }

    /**
     * Get nombreRole
     *
     * @return string 
     */
    public function getNombreRole()
    {
        return $this->nombreRole;
    }

    public function getRole() {
        return $this->getNombreRole();
    }
 
    public function __toString() {
        return $this->getRole();
    }
}
