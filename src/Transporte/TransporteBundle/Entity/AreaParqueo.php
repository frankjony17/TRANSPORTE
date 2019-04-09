<?php

namespace Transporte\TransporteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AreaParqueo
 *
 * @ORM\Table(name="area_parqueo", uniqueConstraints={@ORM\UniqueConstraint(name="area_parqueo_nombre_key", columns={"nombre"})}, indexes={@ORM\Index(name="IDX_765087917373B779", columns={"unidad_organizativa_id"}), @ORM\Index(name="IDX_765087919E8F29A", columns={"area_parqueo_tipo_id"})})
 * @ORM\Entity
 */
class AreaParqueo
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
     * @ORM\Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="telefonos", type="string", length=45, nullable=false)
     */
    private $telefonos;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=120, nullable=false)
     */
    private $direccion;

    /**
     * @var \UnidadOrganizativa
     *
     * @ORM\OneToOne(targetEntity="NomencladorBundle\Entity\UnidadOrganizativa")
     * @ORM\JoinColumn(name="unidad_organizativa_id", referencedColumnName="id")
     */
    private $unidadOrganizativa;

    /**
     * @var \AreaParqueoTipo
     *
     * @ORM\ManyToOne(targetEntity="AreaParqueoTipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="area_parqueo_tipo_id", referencedColumnName="id")
     * })
     */
    private $areaParqueoTipo;


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
     * @return AreaParqueo
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
     * Set telefonos
     *
     * @param string $telefonos
     * @return AreaParqueo
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
     * @return AreaParqueo
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
     * Set unidadOrganizativa
     *
     * @param \NomencladorBundle\Entity\UnidadOrganizativa $unidadOrganizativa
     * @return AreaParqueo
     */
    public function setUnidadOrganizativa(\NomencladorBundle\Entity\UnidadOrganizativa $unidadOrganizativa = null)
    {
        $this->unidadOrganizativa = $unidadOrganizativa;

        return $this;
    }

    /**
     * Get unidadOrganizativa
     *
     * @return \NomencladorBundle\Entity\UnidadOrganizativa
     */
    public function getUnidadOrganizativa()
    {
        return $this->unidadOrganizativa;
    }

    /**
     * Set areaParqueoTipo
     *
     * @param \Transporte\TransporteBundle\Entity\AreaParqueoTipo $areaParqueoTipo
     * @return AreaParqueo
     */
    public function setAreaParqueoTipo(\Transporte\TransporteBundle\Entity\AreaParqueoTipo $areaParqueoTipo = null)
    {
        $this->areaParqueoTipo = $areaParqueoTipo;

        return $this;
    }

    /**
     * Get areaParqueoTipo
     *
     * @return \Transporte\TransporteBundle\Entity\AreaParqueoTipo
     */
    public function getAreaParqueoTipo()
    {
        return $this->areaParqueoTipo;
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
            'telefonos' => $this->telefonos,
            'direccion' => $this->direccion,
            //Tipo
            'areaParqueoTipo' => $this->getAreaParqueoTipo()->getTipo(),
            'unidadOrganizativa' => $this->unidadOrganizativa->getNombre()
        );
    } 
}
