<?php

namespace NomencladorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UnidadOrganizativa
 *
 * @ORM\Table(name="unidad_organizativa", uniqueConstraints={@ORM\UniqueConstraint(name="unidad_organizativa_nombre_acronimo_key", columns={"nombre", "acronimo"})})
 * @ORM\Entity
 */
class UnidadOrganizativa
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="acronimo", type="string", length=15, nullable=true)
     */
    private $acronimo;

    /**
     * @var string
     *
     * @ORM\Column(name="telefonos", type="string", length=45, nullable=true)
     */
    private $telefonos;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=120, nullable=true)
     */
    private $direccion;


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
     * Set nombre
     *
     * @param string $nombre
     * @return UnidadOrganizativa
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set acronimo
     *
     * @param string $acronimo
     * @return UnidadOrganizativa
     */
    public function setAcronimo($acronimo)
    {
        $this->acronimo = $acronimo;

        return $this;
    }

    /**
     * Get acronimo
     *
     * @return string 
     */
    public function getAcronimo()
    {
        return $this->acronimo;
    }

    /**
     * Set telefonos
     *
     * @param string $telefonos
     * @return UnidadOrganizativa
     */
    public function setTelefonos($telefonos)
    {
        $this->telefonos = $telefonos;

        return $this;
    }

    /**
     * Get telefonos
     *
     * @return string 
     */
    public function getTelefonos()
    {
        return $this->telefonos;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return UnidadOrganizativa
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }
    
    /**
     * Get Array Row
     *
     * @return array 
     */    
    public function toArray()
    {
        return array
        (
            'id' => $this->id,
            'nombre' => $this->nombre,
            'acronimo' => $this->acronimo,
            'telefonos' => $this->telefonos,
            'direccion' => $this->direccion

        );
    }
}
