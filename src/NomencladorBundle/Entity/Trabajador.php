<?php

namespace NomencladorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trabajador
 *
 * @ORM\Table(name="trabajador", uniqueConstraints={@ORM\UniqueConstraint(name="trabajador_numero_plaza_key", columns={"numero_plaza"}), @ORM\UniqueConstraint(name="trabajador_movil_key", columns={"movil"})}, indexes={@ORM\Index(name="IDX_42157CDFBD0F409C", columns={"area_id"}), @ORM\Index(name="IDX_42157CDF813AC380", columns={"cargo_id"}), @ORM\Index(name="IDX_42157CDF5A91C08D", columns={"departamento_id"})})
 * @ORM\Entity(repositoryClass="NomencladorBundle\Entity\TrabajadorRepository")
 */
class Trabajador
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
     * @ORM\Column(name="numero_plaza", type="string", length=10, nullable=false)
     */
    private $numeroPlaza;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_apellidos", type="string", length=50, nullable=false)
     */
    private $nombreApellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="movil", type="string", length=10, nullable=true)
     */
    private $movil;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=120, nullable=true)
     */
    private $direccion;

    /**
     * @var \Area
     *
     * @ORM\ManyToOne(targetEntity="Area")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="area_id", referencedColumnName="id")
     * })
     */
    private $area;

    /**
     * @var \Cargo
     *
     * @ORM\ManyToOne(targetEntity="Cargo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cargo_id", referencedColumnName="id")
     * })
     */
    private $cargo;

    /**
     * @var \Departamento
     *
     * @ORM\ManyToOne(targetEntity="Departamento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="departamento_id", referencedColumnName="id")
     * })
     */
    private $departamento;

    /**
     * @var \PersonalHorarioExtralaboralBundle\Entity\HorarioLaboral
     *
     * @ORM\ManyToOne(targetEntity="\PersonalHorarioExtralaboralBundle\Entity\HorarioLaboral")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="horario_laboral_id", referencedColumnName="id")
     * })
     */
    private $horarioLaboral;

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
     * Set numeroPlaza
     *
     * @param string $numeroPlaza
     * @return Trabajador
     */
    public function setNumeroPlaza($numeroPlaza)
    {
        $this->numeroPlaza = $numeroPlaza;

        return $this;
    }

    /**
     * Get numeroPlaza
     *
     * @return string 
     */
    public function getNumeroPlaza()
    {
        return $this->numeroPlaza;
    }

    /**
     * Set nombreApellidos
     *
     * @param string $nombreApellidos
     * @return Trabajador
     */
    public function setNombreApellidos($nombreApellidos)
    {
        $this->nombreApellidos = $nombreApellidos;

        return $this;
    }

    /**
     * Get nombreApellidos
     *
     * @return string 
     */
    public function getNombreApellidos()
    {
        return $this->nombreApellidos;
    }

    /**
     * Set movil
     *
     * @param string $movil
     * @return Trabajador
     */
    public function setMovil($movil)
    {
        $this->movil = $movil;

        return $this;
    }

    /**
     * Get movil
     *
     * @return string 
     */
    public function getMovil()
    {
        return $this->movil;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Trabajador
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
     * Set area
     *
     * @param \NomencladorBundle\Entity\Area $area
     * @return Trabajador
     */
    public function setArea(\NomencladorBundle\Entity\Area $area = null)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return \NomencladorBundle\Entity\Area
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set cargo
     *
     * @param \NomencladorBundle\Entity\Cargo $cargo
     * @return Trabajador
     */
    public function setCargo(\NomencladorBundle\Entity\Cargo $cargo = null)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get cargo
     *
     * @return \NomencladorBundle\Entity\Cargo
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set departamento
     *
     * @param \NomencladorBundle\Entity\Departamento $departamento
     * @return Trabajador
     */
    public function setDepartamento(\NomencladorBundle\Entity\Departamento $departamento = null)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get departamento
     *
     * @return \NomencladorBundle\Entity\Departamento
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * Set horarioLaboral
     *
     * @param \PersonalHorarioExtralaboralBundle\Entity\HorarioLaboral $horarioLaboral
     * @return Trabajador
     */
    public function setHorarioLaboral(\PersonalHorarioExtralaboralBundle\Entity\HorarioLaboral $horarioLaboral = null)
    {
        $this->horarioLaboral = $horarioLaboral;

        return $this;
    }

    /**
     * Get horarioLaboral
     *
     * @return \PersonalHorarioExtralaboralBundle\Entity\HorarioLaboral
     */
    public function getHorarioLaboral()
    {
        return $this->horarioLaboral;
    }
    
    /**
     * Get Array Row
     *
     * @return array 
     */     
    public function toArray()
    {
        return array (
            'id' => $this->id,
            'numeroPlaza' => $this->numeroPlaza,
            'nombreApellidos' => $this->nombreApellidos,
            'movil' => $this->movil ? $this->movil : '',
            'direccion' => $this->direccion,
            'cargo' => $this->getCargo() ? $this->getCargo()->getNombre() : 'Sin asignar.',
            'area' => $this->getArea() ? $this->getArea()->getNombre() : 'Sin asignar.',
            'departamento' => $this->getDepartamento()->getNombre(),
            'horarioLaboral' => $this->getHorarioLaboral()->getDescripcion()

        );
    }    
}
