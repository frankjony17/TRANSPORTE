<?php

namespace Transporte\TransporteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vehiculo
 *
 * @ORM\Table(name="vehiculo", indexes={@ORM\Index(name="IDX_C9FA1603BD0F409C", columns={"area_id"}), @ORM\Index(name="IDX_C9FA1603853948F9", columns={"area_parqueo_id"}), @ORM\Index(name="IDX_C9FA160381EF0041", columns={"marca_id"}), @ORM\Index(name="IDX_C9FA160315C84B52", columns={"matricula_id"}), @ORM\Index(name="IDX_C9FA1603C3A9576E", columns={"modelo_id"}), @ORM\Index(name="IDX_C9FA16037E291D3", columns={"vehiculo_tipo_id"})})
 * @ORM\Entity(repositoryClass="Transporte\TransporteBundle\Entity\VehiculoRepository")
 */
class Vehiculo
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
     * @var \Marca
     *
     * @ORM\ManyToOne(targetEntity="Marca")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="marca_id", referencedColumnName="id")
     * })
     */
    private $marca;

    /**
     * @var \Modelo
     *
     * @ORM\ManyToOne(targetEntity="Modelo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="modelo_id", referencedColumnName="id")
     * })
     */
    private $modelo;

    /**
     * @var \VehiculoTipo
     *
     * @ORM\ManyToOne(targetEntity="VehiculoTipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vehiculo_tipo_id", referencedColumnName="id")
     * })
     */
    private $vehiculoTipo;

    /**
     * @var \Area
     *
     * @ORM\ManyToOne(targetEntity="NomencladorBundle\Entity\Area")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="area_id", referencedColumnName="id")
     * })
     */
    private $area;

    /**
     * @var \AreaParqueo
     *
     * @ORM\ManyToOne(targetEntity="AreaParqueo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="area_parqueo_id", referencedColumnName="id")
     * })
     */
    private $areaParqueo;

    /**
     * @var \Matricula
     *
     * @ORM\OneToOne(targetEntity="Matricula", inversedBy="vehiculo")
     * @ORM\JoinColumn(name="matricula_id", referencedColumnName="id")
     */
    private $matricula;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SituacionOperativa", inversedBy="vehiculo")
     * @ORM\JoinTable(name="situacion_operativa_vehiculo",
     *   joinColumns={
     *     @ORM\JoinColumn(name="vehiculo_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="situacion_operativa_id", referencedColumnName="id")
     *   }
     * )
     */
    private $situacionOperativa;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->situacionOperativa = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set marca
     *
     * @param \Transporte\TransporteBundle\Entity\Marca $marca
     * @return Vehiculo
     */
    public function setMarca(\Transporte\TransporteBundle\Entity\Marca $marca = null)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return \Transporte\TransporteBundle\Entity\Marca
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set modelo
     *
     * @param \Transporte\TransporteBundle\Entity\Modelo $modelo
     * @return Vehiculo
     */
    public function setModelo(\Transporte\TransporteBundle\Entity\Modelo $modelo = null)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return \Transporte\TransporteBundle\Entity\Modelo
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set vehiculoTipo
     *
     * @param \Transporte\TransporteBundle\Entity\VehiculoTipo $vehiculoTipo
     * @return Vehiculo
     */
    public function setVehiculoTipo(\Transporte\TransporteBundle\Entity\VehiculoTipo $vehiculoTipo = null)
    {
        $this->vehiculoTipo = $vehiculoTipo;

        return $this;
    }

    /**
     * Get vehiculoTipo
     *
     * @return \Transporte\TransporteBundle\Entity\VehiculoTipo
     */
    public function getVehiculoTipo()
    {
        return $this->vehiculoTipo;
    }

    /**
     * Set area
     *
     * @param \NomencladorBundle\Entity\Area $area
     * @return Vehiculo
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
     * Set areaParqueo
     *
     * @param \Transporte\TransporteBundle\Entity\AreaParqueo $areaParqueo
     * @return Vehiculo
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
     * Set matricula
     *
     * @param \Transporte\TransporteBundle\Entity\Matricula $matricula
     * @return Vehiculo
     */
    public function setMatricula(\Transporte\TransporteBundle\Entity\Matricula $matricula = null)
    {
        $this->matricula = $matricula;

        return $this;
    }

    /**
     * Get matricula
     *
     * @return \Transporte\TransporteBundle\Entity\Matricula 
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * Add situacionOperativa
     *
     * @param \Transporte\TransporteBundle\Entity\SituacionOperativa $situacionOperativa
     * @return Vehiculo
     */
    public function addSituacionOperativa(\Transporte\TransporteBundle\Entity\SituacionOperativa $situacionOperativa)
    {
        $this->situacionOperativa[] = $situacionOperativa;

        return $this;
    }

    /**
     * Remove situacionOperativa
     *
     * @param \Transporte\TransporteBundle\Entity\SituacionOperativa $situacionOperativa
     */
    public function removeSituacionOperativa(\Transporte\TransporteBundle\Entity\SituacionOperativa $situacionOperativa)
    {
        $this->situacionOperativa->removeElement($situacionOperativa);
    }

    /**
     * Get situacionOperativa
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSituacionOperativa()
    {
        return $this->situacionOperativa;
    }
    
//    /**
//     * Get tipo, marca y modelo
//     *
//     * @return string
//     */
//    public function getTipoMarcaModelo()
//    {
//        return $this->tipo .', '. $this->marca .', '. $this->modelo;
//    }
    
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
            // Vehículo
            'marca' => ($this->marca) ? $this->marca->getNombre() : "",
            'modelo' => ($this->modelo) ? $this->modelo->getNombre() : "",
            'vehiculoTipo' => ($this->vehiculoTipo) ? $this->getVehiculoTipo()->getNombre() : "",
            'area' => $this->area->getNombre(),
            'area_id' => $this->getArea()->getId(),
            'areaParqueo' => $this->getAreaParqueo()->getNombre(),
            'area_parqueo_id' => $this->getAreaParqueo()->getId(),
            // 'situacionOperativa' => $this->getSituacionOperativa()->getId(),
            // 'fecha' =>date_format(new \DateTime('now'),'Y-m-d'),
            // Matricula
            'matriculaId' => $this->getMatricula()->getId(),
            'chapa' => $this->getMatricula()->getChapa()
        );
    }    
}
