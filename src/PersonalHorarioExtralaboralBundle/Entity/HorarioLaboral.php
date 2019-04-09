<?php

namespace PersonalHorarioExtralaboralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HorarioLaboral
 *
 * @ORM\Table(name="horario_laboral", uniqueConstraints={@ORM\UniqueConstraint(name="horario_laboral_hora_entrada_hora_salida_key", columns={"hora_entrada", "hora_salida"})})
 * @ORM\Entity
 */
class HorarioLaboral
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="horario_laboral_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

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
     * @ORM\Column(name="descripcion", type="string", length=120, nullable=true)
     */
    private $descripcion;



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
     * Set horaEntrada
     *
     * @param \DateTime $horaEntrada
     * @return HorarioLaboral
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
     * @return HorarioLaboral
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return HorarioLaboral
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
}
