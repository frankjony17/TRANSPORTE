<?php

namespace Transporte\CirculacionEventualBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CirculacionEventual
 *
 * @ORM\Table(name="circulacion_eventual", uniqueConstraints={@ORM\UniqueConstraint(name="circulacion_eventual_fecha_inicial_fecha_final_chofer_vehic_key", columns={"fecha_inicial", "fecha_final", "chofer_vehiculo_id"})}, indexes={@ORM\Index(name="IDX_2574F0D0FA85302C", columns={"chofer_vehiculo_id"})})
 * @ORM\Entity(repositoryClass="Transporte\CirculacionEventualBundle\Entity\CirculacionEventualRepository")
 */
class CirculacionEventual
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicial", type="date", nullable=false)
     */
    private $fechaInicial;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_final", type="date", nullable=false)
     */
    private $fechaFinal;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_inicial", type="time", nullable=false)
     */
    private $horaInicial;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_final", type="time", nullable=false)
     */
    private $horaFinal;

    /**
     * @var boolean
     *
     * @ORM\Column(name="aprobado", type="boolean", nullable=false)
     */
    private $aprobado;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pendiente", type="boolean", nullable=true)
     */
    private $pendiente;

    /**
     * @var string
     *
     * @ORM\Column(name="tarea", type="string", length=255, nullable=false)
     */
    private $tarea;

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
     * @var \CirculacionEventualTipo
     *
     * @ORM\ManyToOne(targetEntity="CirculacionEventualTipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="circulacion_eventual_tipo_id", referencedColumnName="id")
     * })
     */
    private $circulacionEventualTipo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Poblado", mappedBy="circulacionEventual")
     */
    private $poblado;


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
     * Set fechaInicial
     *
     * @param \DateTime $fechaInicial
     * @return CirculacionEventual
     */
    public function setFechaInicial($fechaInicial)
    {
        $this->fechaInicial = $fechaInicial;

        return $this;
    }

    /**
     * Get fechaInicial
     *
     * @return \DateTime 
     */
    public function getFechaInicial()
    {
        return $this->fechaInicial;
    }

    /**
     * Set fechaFinal
     *
     * @param \DateTime $fechaFinal
     * @return CirculacionEventual
     */
    public function setFechaFinal($fechaFinal)
    {
        $this->fechaFinal = $fechaFinal;

        return $this;
    }

    /**
     * Get fechaFinal
     *
     * @return \DateTime 
     */
    public function getFechaFinal()
    {
        return $this->fechaFinal;
    }

    /**
     * Set horaInicial
     *
     * @param \DateTime $horaInicial
     * @return CirculacionEventual
     */
    public function setHoraInicial($horaInicial)
    {
        $this->horaInicial = $horaInicial;

        return $this;
    }

    /**
     * Get horaInicial
     *
     * @return \DateTime 
     */
    public function getHoraInicial()
    {
        return $this->horaInicial;
    }

    /**
     * Set horaFinal
     *
     * @param \DateTime $horaFinal
     * @return CirculacionEventual
     */
    public function setHoraFinal($horaFinal)
    {
        $this->horaFinal = $horaFinal;

        return $this;
    }

    /**
     * Get horaFinal
     *
     * @return \DateTime 
     */
    public function getHoraFinal()
    {
        return $this->horaFinal;
    }

    /**
     * Set aprobado
     *
     * @param boolean $aprobado
     * @return CirculacionEventual
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
     * Set pendiente
     *
     * @param boolean $pendiente
     * @return CirculacionEventual
     */
    public function setPendiente($pendiente)
    {
        $this->pendiente = $pendiente;

        return $this;
    }

    /**
     * Get pendiente
     *
     * @return boolean 
     */
    public function getPendiente()
    {
        return $this->pendiente;
    }

    /**
     * Set tarea
     *
     * @param string $tarea
     * @return CirculacionEventual
     */
    public function setTarea($tarea)
    {
        $this->tarea = $tarea;

        return $this;
    }

    /**
     * Get tarea
     *
     * @return string 
     */
    public function getTarea()
    {
        return $this->tarea;
    }

    /**
     * Set choferVehiculo
     *
     * @param \Transporte\TransporteBundle\Entity\ChoferVehiculo $choferVehiculo
     * @return CirculacionEventual
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
     * Set circulacionEventualTipo
     *
     * @param \Transporte\CirculacionEventualBundle\Entity\CirculacionEventualTipo $circulacionEventualTipo
     * @return CirculacionEventual
     */
    public function setCirculacionEventualTipo(\Transporte\CirculacionEventualBundle\Entity\CirculacionEventualTipo $circulacionEventualTipo = null)
    {
        $this->circulacionEventualTipo = $circulacionEventualTipo;

        return $this;
    }

    /**
     * Get circulacionEventualTipo
     *
     * @return \Transporte\CirculacionEventualBundle\Entity\CirculacionEventualTipo
     */
    public function getCirculacionEventualTipo()
    {
        return $this->circulacionEventualTipo;
    }

    /**
     * Add poblado
     *
     * @param \Transporte\CirculacionEventualBundle\Entity\Poblado $poblado
     * @return CirculacionEventual
     */
    public function addPoblado(\Transporte\CirculacionEventualBundle\Entity\Poblado $poblado)
    {
        $this->poblado[] = $poblado;

        return $this;
    }

    /**
     * Remove poblado
     *
     * @param \Transporte\CirculacionEventualBundle\Entity\Poblado $poblado
     */
    public function removePoblado(\Transporte\CirculacionEventualBundle\Entity\Poblado $poblado)
    {
        $this->poblado->removeElement($poblado);
    }

    /**
     * Get poblado
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPoblado()
    {
        return $this->poblado;
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
            'fecha_inicial' =>date_format(new \DateTime('now'),'d-m-Y'),
            'fecha_final' =>date_format(new \DateTime('now'),'d-m-Y'),
            'hora_inicial' => $this->horaInicial->format('H:i:s'),
            'hora_final' => $this->horaFinal->format('H:i:s'),
            'aprobado' => ($this->aprobado) ? 'SI' : 'NO',
            'pendiente' => ($this->pendiente) ? 'SI' : 'NO',
            'tarea' => $this->tarea,
            'circulacion_eventual_tipo_id' => $this->getCirculacionEventualTipo()->getId(),
            'circulacion_eventual_tipo' => $this->getCirculacionEventualTipo()->getNombre(),
            'chofer_vehiculo_id' => $this->getChoferVehiculo()->getId(),
            //Vehiculo
            'matricula_id' => $this->getChoferVehiculo()->getVehiculo()->getMatricula()->getId(),
            'chapa' => $this->getChoferVehiculo()->getVehiculo()->getMatricula()->getChapa(),
            'tipo_vehiculo' => $this->getChoferVehiculo()->getVehiculo()->getVehiculoTipo()->getNombre(),
            'marca' => $this->getChoferVehiculo()->getVehiculo()->getMarca()->getNombre(),
            'modelo' => $this->getChoferVehiculo()->getVehiculo()->getModelo()->getNombre(),
            //Chofer
            'chofer' => $this->getChoferVehiculo()->getChofer()->getTrabajador()->getNombreApellidos(),
            'licencia' => $this->getChoferVehiculo()->getChofer()->getLicencia(),            
            //Unidad organizativa
            'unidad_organizativa' => $this->getChoferVehiculo()->getVehiculo()->getArea()->getUnidadOrgnizativa()->getNombre()

//            'area_parqueo' => $this->getChoferVehiculo()->getVehiculo()->getAreaParqueo()->getNombre(),
//            'area' => $this->getChoferVehiculo()->getVehiculo()->getArea()->getNombre(),
//            
        );
    }
}
