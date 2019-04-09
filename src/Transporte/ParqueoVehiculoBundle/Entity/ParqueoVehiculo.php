<?php

namespace Transporte\ParqueoVehiculoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParqueoVehiculo
 *
 * @ORM\Table(name="parqueo_vehiculo", uniqueConstraints={@ORM\UniqueConstraint(name="parqueo_vehiculo_fecha_emision_fecha_vencimiento_chofer_veh_key", columns={"fecha_emision", "fecha_vencimiento", "chofer_vehiculo_id"})}, indexes={@ORM\Index(name="IDX_18CE60002DAB6073", columns={"parqueo_vehiculo_tipo_id"}), @ORM\Index(name="IDX_18CE6000853948F9", columns={"area_parqueo_id"}), @ORM\Index(name="IDX_18CE6000FA85302C", columns={"chofer_vehiculo_id"})})
 * @ORM\Entity(repositoryClass="Transporte\ParqueoVehiculoBundle\Entity\ParqueoVehiculoRepository")
 */
class ParqueoVehiculo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="parqueo_vehiculo_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_emision", type="date", nullable=false)
     */
    private $fechaEmision;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_vencimiento", type="date", nullable=false)
     */
    private $fechaVencimiento;

    /**
     * @var boolean
     *
     * @ORM\Column(name="aprobado", type="boolean", nullable=true)
     */
    private $aprobado;

    /**
     * @var \ParqueoVehiculoTipo
     *
     * @ORM\ManyToOne(targetEntity="ParqueoVehiculoTipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parqueo_vehiculo_tipo_id", referencedColumnName="id")
     * })
     */
    private $parqueoVehiculoTipo;

    /**
     * @var \Transporte\TransporteBundle\Entity\AreaParqueo
     *
     * @ORM\ManyToOne(targetEntity="\Transporte\TransporteBundle\Entity\AreaParqueo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="area_parqueo_id", referencedColumnName="id")
     * })
     */
    private $areaParqueo;

    /**
     * @var \Transporte\TransporteBundle\Entity\ChoferVehiculo
     *
     * @ORM\ManyToOne(targetEntity="\Transporte\TransporteBundle\Entity\ChoferVehiculo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="chofer_vehiculo_id", referencedColumnName="id")
     * })
     */
    private $choferVehiculo;



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
     * Set fechaEmision
     *
     * @param \DateTime $fechaEmision
     * @return ParqueoVehiculo
     */
    public function setFechaEmision($fechaEmision)
    {
        $this->fechaEmision = $fechaEmision;

        return $this;
    }

    /**
     * Get fechaEmision
     *
     * @return \DateTime 
     */
    public function getFechaEmision()
    {
        return $this->fechaEmision;
    }

    /**
     * Set fechaVencimiento
     *
     * @param \DateTime $fechaVencimiento
     * @return ParqueoVehiculo
     */
    public function setFechaVencimiento($fechaVencimiento)
    {
        $this->fechaVencimiento = $fechaVencimiento;

        return $this;
    }

    /**
     * Get fechaVencimiento
     *
     * @return \DateTime 
     */
    public function getFechaVencimiento()
    {
        return $this->fechaVencimiento;
    }

    /**
     * Set aprobado
     *
     * @param boolean $aprobado
     * @return ParqueoVehiculo
     */
    public function setAprobado($aprobado)
    {
        $this->aprobado = $aprobado;

        return $this;
    }

    /**
     * Get aprobado
     *
     * @return boolean 
     */
    public function getAprobado()
    {
        return $this->aprobado;
    }

    /**
     * Set parqueoVehiculoTipo
     *
     * @param \Transporte\ParqueoVehiculoBundle\Entity\ParqueoVehiculoTipo $parqueoVehiculoTipo
     * @return ParqueoVehiculo
     */
    public function setParqueoVehiculoTipo(\Transporte\ParqueoVehiculoBundle\Entity\ParqueoVehiculoTipo $parqueoVehiculoTipo = null)
    {
        $this->parqueoVehiculoTipo = $parqueoVehiculoTipo;

        return $this;
    }

    /**
     * Get parqueoVehiculoTipo
     *
     * @return \Transporte\ParqueoVehiculoBundle\Entity\ParqueoVehiculoTipo 
     */
    public function getParqueoVehiculoTipo()
    {
        return $this->parqueoVehiculoTipo;
    }

    /**
     * Set areaParqueo
     *
     * @param \Transporte\TransporteBundle\Entity\AreaParqueo $areaParqueo
     * @return ParqueoVehiculo
     */
    public function setAreaParqueo(\Transporte\TransporteBundle\Entity\AreaParqueo $areaParqueo = null)
    {
        $this->areaParqueo = $areaParqueo;

        return $this;
    }

    /**
     * Get areaParqueo
     *
     * @return \Transporte\TransporteBundle\Entity\AreaParqueo
     */
    public function getAreaParqueo()
    {
        return $this->areaParqueo;
    }

    /**
     * Set choferVehiculo
     *
     * @param \Transporte\TransporteBundle\Entity\ChoferVehiculo $choferVehiculo
     * @return ParqueoVehiculo
     */
    public function setChoferVehiculo(\Transporte\TransporteBundle\Entity\ChoferVehiculo $choferVehiculo = null)
    {
        $this->choferVehiculo = $choferVehiculo;

        return $this;
    }

    /**
     * Get choferVehiculo
     *
     * @return \Transporte\TransporteBundle\Entity\ChoferVehiculo
     */
    public function getChoferVehiculo()
    {
        return $this->choferVehiculo;
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
            'fecha_emision' =>date_format(new \DateTime('now'),'d-m-Y'),
            'fecha_vencimiento' =>date_format(new \DateTime('now'),'d-m-Y'),
            'aprobado' => ($this->aprobado) ? 'SI' : 'NO',
            'parqueo_vehiculo_tipo_id' => $this->getParqueoVehiculoTipo()->getId(),
            'parqueo_vehiculo_tipo' => $this->getParqueoVehiculoTipo()->getTipo(),
            //Area de Parqueo
            'area_parqueo_id' => $this->getAreaParqueo()->getId(),
            'direccion_area_parqueo' => $this->getAreaParqueo()->getDireccion(),
            //Vehiculo
            'chofer_vehiculo_id' => $this->getChoferVehiculo()->getId(),        
            'matricula_id' => $this->getChoferVehiculo()->getVehiculo()->getMatricula()->getId(),
            'chapa' => $this->getChoferVehiculo()->getVehiculo()->getMatricula()->getChapa(),
            'tipo_vehiculo' => $this->getChoferVehiculo()->getVehiculo()->getVehiculoTipo()->getNombre(),
            'marca' => $this->getChoferVehiculo()->getVehiculo()->getMarca()->getNombre(),
            'modelo' => $this->getChoferVehiculo()->getVehiculo()->getModelo()->getNombre(),
            //Chofer
            'chofer' => $this->getChoferVehiculo()->getChofer()->getTrabajador()->getNombreApellidos(),
            'cargo_chofer' => $this->getChoferVehiculo()->getChofer()->getTrabajador()->getCargo()->getNombre(),
            //Unidad Organizativa
            'unidad_organizativa' => $this->getChoferVehiculo()->getVehiculo()->getArea()->getUnidadOrgnizativa()->getNombre(),
            'direccion_unidad_organizativa' => $this->getChoferVehiculo()->getVehiculo()->getArea()->getUnidadOrgnizativa()->getDireccion()
//            'area' => $this->getChoferVehiculo()->getVehiculo()->getArea()->getNombre(),
         );
    }
}
