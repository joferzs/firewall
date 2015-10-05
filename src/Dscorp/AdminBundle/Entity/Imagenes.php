<?php

namespace Dscorp\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Imagenes
 */
class Imagenes
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombreImagen;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $imagen;


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
     * Set nombreImagen
     *
     * @param string $nombreImagen
     * @return Imagenes
     */
    public function setNombreImagen($nombreImagen)
    {
        $this->nombreImagen = $nombreImagen;

        return $this;
    }

    /**
     * Get nombreImagen
     *
     * @return string 
     */
    public function getNombreImagen()
    {
        return $this->nombreImagen;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Imagenes
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set imagen
     *
     * @param string $imagen
     * @return Imagenes
     */
    public function setImagen(UploadedFile $imagen = null)
    {
        $this->imagen = $imagen;
        if($imagen!=null){
            $this->upload();
        }
        return $this;
    }

    /**
     * Get imagen
     *
     * @return string 
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getImagen()) {
            return;
        }

        // aquí usa el nombre de archivo original pero lo debes
        // sanear al menos para evitar cualquier problema de seguridad

        // move takes the target directory and then the
        // target filename to move to
        $this->getImagen()->move(
            $this->getUploadRootDir(),
            $this->getImagen()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->path = $this->getImagen()->getClientOriginalName();
        $this->imagen=$this->getWebPath();
        // limpia la propiedad «file» ya que no la necesitas más
        //$this->path = null;
    }

    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // la ruta absoluta del directorio donde se deben
        // guardar los archivos cargados
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // se deshace del __DIR__ para no meter la pata
        // al mostrar el documento/imagen cargada en la vista.
        return 'bundles/dscorpadmin/imagenes';
    }

    public function __toString()
    {
       return $this->path; 
    }
}
