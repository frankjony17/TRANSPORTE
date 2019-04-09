<?php

namespace Transporte\ParqueoVehiculoBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ParqueoVehiculoRepository extends EntityRepository
{
	/**
     * Listar todos los vehículos de la Unidad Organizativa actual que esten trabajando en la fecha actual y que tengan parqueo eventual.
     * 
     * @param type $value
     * @param type $uo_id
     * 
     * @return Object
     */
    public function findVehiculosParqueoEventual($uo_id)
    {
        $query = "SELECT matricula_id, matricula.chapa, trabajador.nombre_apellidos AS chofer, area_parqueo.nombre AS area_parqueo, area_parqueo.direccion AS direccion_area_parqueo, unidad_organizativa.nombre AS unidad_organizativa, unidad_organizativa.direccion AS direccion_unidad_organizativa, chofer_vehiculo.id AS chofer_vehiculo_id, vehiculo.id AS vehiculo_id, marca.nombre AS marca, modelo.nombre AS modelo, vehiculo_tipo.nombre AS tipo_vehiculo, situacion_operativa.nombre AS situacion_operativa, chofer.licencia, ";
        $query .= "(SELECT fecha_emision FROM parqueo_vehiculo WHERE fecha_vencimiento >= ('28-04-2016') AND chofer_vehiculo_id = chofer_vehiculo.id) AS fecha_emision, ";
        $query .= "(SELECT fecha_vencimiento FROM parqueo_vehiculo WHERE fecha_vencimiento >= ('28-04-2016') AND chofer_vehiculo_id = chofer_vehiculo.id) AS fecha_vencimiento, ";
        $query .= "(SELECT aprobado FROM parqueo_vehiculo WHERE fecha_vencimiento >= ('28-04-2016') AND chofer_vehiculo_id = chofer_vehiculo.id) AS aprobado, ";
        $query .= "(SELECT parqueo_vehiculo_tipo_id FROM parqueo_vehiculo WHERE fecha_vencimiento >= ('28-04-2016') AND chofer_vehiculo_id = chofer_vehiculo.id) AS parqueo_vehiculo_tipo_id, ";
        $query .= "(SELECT area_parqueo_id FROM parqueo_vehiculo WHERE fecha_vencimiento >= ('28-04-2016') AND chofer_vehiculo_id = chofer_vehiculo.id) AS area_parqueo_id, ";
        $query .= "(SELECT id FROM parqueo_vehiculo WHERE fecha_vencimiento >= ('28-04-2016') AND chofer_vehiculo_id = chofer_vehiculo.id) AS parqueo_vehiculo_id, ";
        $query .= "parqueo_vehiculo_tipo.tipo AS parqueo_vehiculo_tipo, trabajador.cargo_id AS cargo_chofer_id, cargo.nombre AS cargo_chofer FROM vehiculo ";
        $query .= "INNER JOIN matricula ON matricula.id = vehiculo.matricula_id ";
        $query .= "INNER JOIN marca ON marca.id = vehiculo.marca_id ";
        $query .= "INNER JOIN modelo ON modelo.id = vehiculo.modelo_id ";
        $query .= "INNER JOIN vehiculo_tipo ON vehiculo_tipo.id = vehiculo.vehiculo_tipo_id ";
        $query .= "INNER JOIN chofer_vehiculo ON vehiculo.id = chofer_vehiculo.vehiculo_id ";
        $query .= "INNER JOIN parqueo_vehiculo ON chofer_vehiculo.id = parqueo_vehiculo.chofer_vehiculo_id ";
        $query .= "INNER JOIN parqueo_vehiculo_tipo ON parqueo_vehiculo_tipo.id = parqueo_vehiculo.parqueo_vehiculo_tipo_id ";
        $query .= "INNER JOIN area_parqueo ON area_parqueo.id = vehiculo.area_parqueo_id ";
        $query .= "INNER JOIN chofer ON chofer.id = chofer_vehiculo.chofer_id ";
        $query .= "INNER JOIN trabajador ON trabajador.id = chofer.trabajador_id ";
        $query .= "INNER JOIN cargo ON cargo.id = trabajador.cargo_id ";
        $query .= "INNER JOIN area ON  area.id = vehiculo. area_id ";
        $query .= "INNER JOIN unidad_organizativa ON  unidad_organizativa.id = area. unidad_organizativa_id ";
        $query .= "INNER JOIN situacion_operativa_vehiculo ON  situacion_operativa_vehiculo.vehiculo_id = vehiculo.id ";
        $query .= "INNER JOIN situacion_operativa ON  situacion_operativa.id = situacion_operativa_vehiculo.situacion_operativa_id ";
        $query .= "WHERE unidad_organizativa.id = '".$uo_id."' AND  situacion_operativa.nombre = ('trabajando') AND parqueo_vehiculo_tipo.tipo = ('eventual') ";

        $fetch = $this->getEntityManager()->getConnection()->fetchAll($query);

        $parqueo_vehiculo_eventual = array();

        foreach ($fetch as $value) {
            $parqueo_vehiculo_eventual[] = array(
                'chapa' => $value['chapa'],
                'chofer' => $value['chofer'],                
                'cargo_chofer' => $value['cargo_chofer'],
                'unidad_organizativa' => $value['unidad_organizativa'],
                'direccion_unidad_organizativa' => $value['direccion_unidad_organizativa'],
               	'marca' => $value['marca'],
               	'modelo' => $value['modelo'],
                'tipo_vehiculo' => $value['tipo_vehiculo'],
                'licencia' => $value['licencia'],
                'fecha_emision' => $value['fecha_emision'],
                'fecha_vencimiento' => $value['fecha_vencimiento'],
                'aprobado' => $value['aprobado'],
                'parqueo_vehiculo_tipo' => $value['parqueo_vehiculo_tipo'],
                'matricula_id' => $value['matricula_id'],
                'parqueo_vehiculo_id' => $value['parqueo_vehiculo_id'],
                'area_parqueo_id' => $value['area_parqueo_id'],
                'direccion_area_parqueo' => $value['direccion_area_parqueo'],
                'chofer_vehiculo_id' => $value['chofer_vehiculo_id']
            );
        }
        return $parqueo_vehiculo_eventual;
    }

    /**
     * Listar todos los vehículos de la Unidad Organizativa actual que esten trabajando en la fecha actual y que tengan parqueo permanente.
     * 
     * @param type $value
     * @param type $uo_id
     * 
     * @return Object
     */
    public function findVehiculosParqueoPermanente($uo_id)
    {
        $query = "SELECT matricula_id, matricula.chapa, trabajador.nombre_apellidos AS chofer, area_parqueo.nombre AS area_parqueo, area_parqueo.direccion AS direccion_area_parqueo, unidad_organizativa.nombre AS unidad_organizativa, unidad_organizativa.direccion AS direccion_unidad_organizativa, chofer_vehiculo.id AS chofer_vehiculo_id, vehiculo.id AS vehiculo_id, marca.nombre AS marca, modelo.nombre AS modelo, vehiculo_tipo.nombre AS tipo_vehiculo, situacion_operativa.nombre AS situacion_operativa, chofer.licencia, ";
        $query .= "(SELECT fecha_emision FROM parqueo_vehiculo WHERE fecha_vencimiento >= ('28-04-2016') AND chofer_vehiculo_id = chofer_vehiculo.id) AS fecha_emision, ";
        $query .= "(SELECT fecha_vencimiento FROM parqueo_vehiculo WHERE fecha_vencimiento >= ('28-04-2016') AND chofer_vehiculo_id = chofer_vehiculo.id) AS fecha_vencimiento, ";
        $query .= "(SELECT aprobado FROM parqueo_vehiculo WHERE fecha_vencimiento >= ('28-04-2016') AND chofer_vehiculo_id = chofer_vehiculo.id) AS aprobado, ";
        $query .= "(SELECT parqueo_vehiculo_tipo_id FROM parqueo_vehiculo WHERE fecha_vencimiento >= ('28-04-2016') AND chofer_vehiculo_id = chofer_vehiculo.id) AS parqueo_vehiculo_tipo_id, ";
        $query .= "(SELECT area_parqueo_id FROM parqueo_vehiculo WHERE fecha_vencimiento >= ('28-04-2016') AND chofer_vehiculo_id = chofer_vehiculo.id) AS area_parqueo_id, ";
        $query .= "(SELECT id FROM parqueo_vehiculo WHERE fecha_vencimiento >= ('28-04-2016') AND chofer_vehiculo_id = chofer_vehiculo.id) AS parqueo_vehiculo_id, ";
        $query .= "parqueo_vehiculo_tipo.tipo AS parqueo_vehiculo_tipo, trabajador.cargo_id AS cargo_chofer_id, cargo.nombre AS cargo_chofer FROM vehiculo ";
        $query .= "INNER JOIN matricula ON matricula.id = vehiculo.matricula_id ";
        $query .= "INNER JOIN marca ON marca.id = vehiculo.marca_id ";
        $query .= "INNER JOIN modelo ON modelo.id = vehiculo.modelo_id ";
        $query .= "INNER JOIN vehiculo_tipo ON vehiculo_tipo.id = vehiculo.vehiculo_tipo_id ";
        $query .= "INNER JOIN chofer_vehiculo ON vehiculo.id = chofer_vehiculo.vehiculo_id ";
        $query .= "INNER JOIN parqueo_vehiculo ON chofer_vehiculo.id = parqueo_vehiculo.chofer_vehiculo_id ";
        $query .= "INNER JOIN parqueo_vehiculo_tipo ON parqueo_vehiculo_tipo.id = parqueo_vehiculo.parqueo_vehiculo_tipo_id ";
        $query .= "INNER JOIN area_parqueo ON area_parqueo.id = vehiculo.area_parqueo_id ";
        $query .= "INNER JOIN chofer ON chofer.id = chofer_vehiculo.chofer_id ";
        $query .= "INNER JOIN trabajador ON trabajador.id = chofer.trabajador_id ";
        $query .= "INNER JOIN cargo ON cargo.id = trabajador.cargo_id ";
        $query .= "INNER JOIN area ON  area.id = vehiculo. area_id ";
        $query .= "INNER JOIN unidad_organizativa ON  unidad_organizativa.id = area. unidad_organizativa_id ";
        $query .= "INNER JOIN situacion_operativa_vehiculo ON  situacion_operativa_vehiculo.vehiculo_id = vehiculo.id ";
        $query .= "INNER JOIN situacion_operativa ON  situacion_operativa.id = situacion_operativa_vehiculo.situacion_operativa_id ";
        $query .= "WHERE unidad_organizativa.id = '".$uo_id."' AND  situacion_operativa.nombre = ('trabajando') AND parqueo_vehiculo_tipo.tipo = ('permanente') ";

        $fetch = $this->getEntityManager()->getConnection()->fetchAll($query);

        $parqueo_vehiculo_permanente = array();

        foreach ($fetch as $value) {
            $parqueo_vehiculo_permanente[] = array(
                'chapa' => $value['chapa'],
                'chofer' => $value['chofer'],                
                'cargo_chofer' => $value['cargo_chofer'],
                'unidad_organizativa' => $value['unidad_organizativa'],
                'direccion_unidad_organizativa' => $value['direccion_unidad_organizativa'],
               	'marca' => $value['marca'],
               	'modelo' => $value['modelo'],
                'tipo_vehiculo' => $value['tipo_vehiculo'],
                'licencia' => $value['licencia'],
                'fecha_emision' => $value['fecha_emision'],
                'fecha_vencimiento' => $value['fecha_vencimiento'],
                'aprobado' => $value['aprobado'],
                'parqueo_vehiculo_tipo' => $value['parqueo_vehiculo_tipo'],
                'matricula_id' => $value['matricula_id'],
                'parqueo_vehiculo_id' => $value['parqueo_vehiculo_id'],
                'area_parqueo_id' => $value['area_parqueo_id'],
                'direccion_area_parqueo' => $value['direccion_area_parqueo'],
                'chofer_vehiculo_id' => $value['chofer_vehiculo_id']
            );
        }
        return $parqueo_vehiculo_permanente;
    }
}