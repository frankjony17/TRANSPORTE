<?php

namespace Transporte\ParqueoVehiculoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TrabajadorAutorizo
 *
 * @ORM\Table(name="trabajador_autorizo", indexes={@ORM\Index(name="IDX_ABF80DDFEC3656E", columns={"trabajador_id"}), @ORM\Index(name="IDX_ABF80DDF9DB3BF92", columns={"trabajador_autorizo_tipo_id"}), @ORM\Index(name="IDX_ABF80DDFA81CA4BD", columns={"circulacion_eventual_id"}), @ORM\Index(name="IDX_ABF80DDF7F604138", columns={"parqueo_vehiculo_id"})})
 * @ORM\Entity
 */
class TrabajadorAutorizo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="trabajador_autorizo_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \Trabajador
     *
     * @ORM\ManyToOne(targetEntity="Trabajador")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="trabajador_id", referencedColumnName="id")
     * })
     */
    private $trabajador;

    /**
     * @var \TrabajadorAutorizoTipo
     *
     * @ORM\ManyToOne(targetEntity="TrabajadorAutorizoTipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="trabajador_autorizo_tipo_id", referencedColumnName="id")
     * })
     */
    private $trabajadorAutorizoTipo;

    /**
     * @var \CirculacionEventual
     *
     * @ORM\ManyToOne(targetEntity="CirculacionEventual")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="circulacion_eventual_id", referencedColumnName="id")
     * })
     */
    private $circulacionEventual;

    /**
     * @var \ParqueoVehiculo
     *
     * @ORM\ManyToOne(targetEntity="ParqueoVehiculo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parqueo_vehiculo_id", referencedColumnName="id")
     * })
     */
    private $parqueoVehiculo;



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
     * Set trabajador
     *
     * @param \Transporte\ParqueoVehiculoBundle\Entity\Trabajador $trabajador
     * @return TrabajadorAutorizo
     */
    public function setTrabajador(\Transporte\ParqueoVehiculoBundle\Entity\Trabajador $trabajador = null)
    {
        $this->trabajador = $trabajador;

        return $this;
    }

    /**
     * Get trabajador
     *
     * @return \Transporte\ParqueoVehiculoBundle\Entity\Trabajador 
     */
    public function getTrabajador()
    {
        return $this->trabajador;
    }

    /**
     * Set trabajadorAutorizoTipo
     *
     * @param \Transporte\ParqueoVehiculoBundle\Entity\TrabajadorAutorizoTipo $trabajadorAutorizoTipo
     * @return TrabajadorAutorizo
     */
    public function setTrabajadorAutorizoTipo(\Transporte\ParqueoVehiculoBundle\Entity\TrabajadorAutorizoTipo $trabajadorAutorizoTipo = null)
    {
        $this->trabajadorAutorizoTipo = $trabajadorAutorizoTipo;

        return $this;
    }

    /**
     * Get trabajadorAutorizoTipo
     *
     * @return \Transporte\ParqueoVehiculoBundle\Entity\TrabajadorAutorizoTipo 
     */
    public function getTrabajadorAutorizoTipo()
    {
        return $this->trabajadorAutorizoTipo;
    }

    /**
     * Set circulacionEventual
     *
     * @param \Transporte\ParqueoVehiculoBundle\Entity\CirculacionEventual $circulacionEventual
     * @return TrabajadorAutorizo
     */
    public function setCirculacionEventual(\Transporte\ParqueoVehiculoBundle\Entity\CirculacionEventual $circulacionEventual = null)
    {
        $this->circulacionEventual = $circulacionEventual;

        return $this;
    }

    /**
     * Get circulacionEventual
     *
     * @return \Transporte\ParqueoVehiculoBundle\Entity\CirculacionEventual 
     */
    public function getCirculacionEventual()
    {
        return $this->circulacionEventual;
    }

    /**
     * Set parqueoVehiculo
     *
     * @param \Transporte\ParqueoVehiculoBundle\Entity\ParqueoVehiculo $parqueoVehiculo
     * @return TrabajadorAutorizo
     */
    public function setParqueoVehiculo(\Transporte\ParqueoVehiculoBundle\Entity\ParqueoVehiculo $parqueoVehiculo = null)
    {
        $this->parqueoVehiculo = $parqueoVehiculo;

        return $this;
    }

    /**
     * Get parqueoVehiculo
     *
     * @return \Transporte\ParqueoVehiculoBundle\Entity\ParqueoVehiculo 
     */
    public function getParqueoVehiculo()
    {
        return $this->parqueoVehiculo;
    }
}
