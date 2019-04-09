<?php

namespace PersonalHorarioExtralaboralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonalHorarioExtralaboral
 *
 * @ORM\Table(name="personal_horario_extralaboral", uniqueConstraints={@ORM\UniqueConstraint(name="personal_horario_extralaboral_fecha_trabajador_id_key", columns={"fecha", "trabajador_id"})}, indexes={@ORM\Index(name="IDX_F76C1D2D8A8639B7", columns={"oficina_id"}), @ORM\Index(name="IDX_F76C1D2D3C3746F4", columns={"personal_horario_extralaboral_tipo_id"}), @ORM\Index(name="IDX_F76C1D2DEC3656E", columns={"trabajador_id"})})
 * @ORM\Entity
 */
class PersonalHorarioExtralaboral
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="personal_horario_extralaboral_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_entrada", type="time", nullable=false)
     */
    private $horaEntrada;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_salida", type="time", nullable=false)
     */
    private $horaSalida;

    /**
     * @var string
     *
     * @ORM\Column(name="motivo", type="string", length=120, nullable=false)
     */
    private $motivo;

    /**
     * @var \Oficina
     *
     * @ORM\ManyToOne(targetEntity="Oficina")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="oficina_id", referencedColumnName="id")
     * })
     */
    private $oficina;

    /**
     * @var \PersonalHorarioExtralaboralTipo
     *
     * @ORM\ManyToOne(targetEntity="PersonalHorarioExtralaboralTipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="personal_horario_extralaboral_tipo_id", referencedColumnName="id")
     * })
     */
    private $personalHorarioExtralaboralTipo;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return PersonalHorarioExtralaboral
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set horaEntrada
     *
     * @param \DateTime $horaEntrada
     * @return PersonalHorarioExtralaboral
     */
    public function setHoraEntrada($horaEntrada)
    {
        $this->horaEntrada = $horaEntrada;

        return $this;
    }

    /**
     * Get horaEntrada
     *
     * @return \DateTime 
     */
    public function getHoraEntrada()
    {
        return $this->horaEntrada;
    }

    /**
     * Set horaSalida
     *
     * @param \DateTime $horaSalida
     * @return PersonalHorarioExtralaboral
     */
    public function setHoraSalida($horaSalida)
    {
        $this->horaSalida = $horaSalida;

        return $this;
    }

    /**
     * Get horaSalida
     *
     * @return \DateTime 
     */
    public function getHoraSalida()
    {
        return $this->horaSalida;
    }

    /**
     * Set motivo
     *
     * @param string $motivo
     * @return PersonalHorarioExtralaboral
     */
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;

        return $this;
    }

    /**
     * Get motivo
     *
     * @return string 
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * Set oficina
     *
     * @param \PersonalHorarioExtralaboralBundle\Entity\Oficina $oficina
     * @return PersonalHorarioExtralaboral
     */
    public function setOficina(\PersonalHorarioExtralaboralBundle\Entity\Oficina $oficina = null)
    {
        $this->oficina = $oficina;

        return $this;
    }

    /**
     * Get oficina
     *
     * @return \PersonalHorarioExtralaboralBundle\Entity\Oficina
     */
    public function getOficina()
    {
        return $this->oficina;
    }

    /**
     * Set personalHorarioExtralaboralTipo
     *
     * @param \PersonalHorarioExtralaboralBundle\Entity\PersonalHorarioExtralaboralTipo $personalHorarioExtralaboralTipo
     * @return PersonalHorarioExtralaboral
     */
    public function setPersonalHorarioExtralaboralTipo(\PersonalHorarioExtralaboralBundle\Entity\PersonalHorarioExtralaboralTipo $personalHorarioExtralaboralTipo = null)
    {
        $this->personalHorarioExtralaboralTipo = $personalHorarioExtralaboralTipo;

        return $this;
    }

    /**
     * Get personalHorarioExtralaboralTipo
     *
     * @return \PersonalHorarioExtralaboralBundle\Entity\PersonalHorarioExtralaboralTipo
     */
    public function getPersonalHorarioExtralaboralTipo()
    {
        return $this->personalHorarioExtralaboralTipo;
    }

    /**
     * Set trabajador
     *
     * @param \PersonalHorarioExtralaboralBundle\Entity\Trabajador $trabajador
     * @return PersonalHorarioExtralaboral
     */
    public function setTrabajador(\PersonalHorarioExtralaboralBundle\Entity\Trabajador $trabajador = null)
    {
        $this->trabajador = $trabajador;

        return $this;
    }

    /**
     * Get trabajador
     *
     * @return \PersonalHorarioExtralaboralBundle\Entity\Trabajador
     */
    public function getTrabajador()
    {
        return $this->trabajador;
    }
}
