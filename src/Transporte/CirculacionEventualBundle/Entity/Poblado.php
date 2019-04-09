<?php

namespace Transporte\CirculacionEventualBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Poblado
 *
 * @ORM\Table(name="poblado", uniqueConstraints={@ORM\UniqueConstraint(name="poblado_nombre_unidad_organizativa_id_key", columns={"nombre", "unidad_organizativa_id"})}, indexes={@ORM\Index(name="IDX_8F2DAD317373B779", columns={"unidad_organizativa_id"})})
 * @ORM\Entity
 */
class Poblado
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="poblado_id_seq", allocationSize=1, initialValue=1)
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
     * @ORM\Column(name="ubicacion", type="string", length=128, nullable=false)
     */
    private $ubicacion;

    /**
     * @var float
     *
     * @ORM\Column(name="distancia", type="float", precision=10, scale=0, nullable=false)
     */
    private $distancia;

    /**
     * @var \NomencladorBundle\Entity\UnidadOrganizativa
     *
     * @ORM\ManyToOne(targetEntity="\NomencladorBundle\Entity\UnidadOrganizativa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="unidad_organizativa_id", referencedColumnName="id")
     * })
     */
    private $unidadOrganizativa;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CirculacionEventual", inversedBy="poblado")
     * @ORM\JoinTable(name="circulacion_eventual_poblado",
     *   joinColumns={
     *     @ORM\JoinColumn(name="poblado_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="circulacion_eventual_id", referencedColumnName="id")
     *   }
     * )
     */
    private $circulacionEventual;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->circulacionEventual = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * @return Poblado
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
     * Set ubicacion
     *
     * @param string $ubicacion
     * @return Poblado
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get ubicacion
     *
     * @return string 
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * Set distancia
     *
     * @param float $distancia
     * @return Poblado
     */
    public function setDistancia($distancia)
    {
        $this->distancia = $distancia;

        return $this;
    }

    /**
     * Get distancia
     *
     * @return float 
     */
    public function getDistancia()
    {
        return $this->distancia;
    }

    /**
     * Set unidadOrganizativa
     *
     * @param \NomencladorBundle\Entity\UnidadOrganizativa $unidadOrganizativa
     * @return Poblado
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
     * Add circulacionEventual
     *
     * @param \Transporte\CirculacionEventualBundle\Entity\CirculacionEventual $circulacionEventual
     * @return Poblado
     */
    public function addCirculacionEventual(\Transporte\CirculacionEventualBundle\Entity\CirculacionEventual $circulacionEventual)
    {
        $this->circulacionEventual[] = $circulacionEventual;

        return $this;
    }

    /**
     * Remove circulacionEventual
     *
     * @param \Transporte\CirculacionEventualBundle\Entity\CirculacionEventual $circulacionEventual
     */
    public function removeCirculacionEventual(\Transporte\CirculacionEventualBundle\Entity\CirculacionEventual $circulacionEventual)
    {
        $this->circulacionEventual->removeElement($circulacionEventual);
    }

    /**
     * Get circulacionEventual
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCirculacionEventual()
    {
        return $this->circulacionEventual;
    }
}
