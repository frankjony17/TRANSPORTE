<?php

namespace Transporte\CirculacionEventualBundle\Entity;

use Doctrine\ORM\EntityRepository;

class CirculacionEventualRepository extends EntityRepository
{
	/**
     * Listar todos los vehículos de la Unidad Organizativa actual que esten trabajando en la fecha actual y que tengan circulacion evental ordinaria.
     * 
     * @param type $value
     * @param type $uo_id
     * 
     * @return Object
     */
    public function findVehiculosCirculacionOrdinaria($uo_id)
    {
        $query = "SELECT matricula_id, matricula.chapa, trabajador.nombre_apellidos AS chofer, unidad_organizativa.nombre AS unidad_organizativa, chofer_vehiculo.id AS chofer_vehiculo_id, vehiculo.id AS vehiculo_id, marca.nombre AS marca, modelo.nombre AS modelo, vehiculo_tipo.nombre AS tipo_vehiculo, situacion_operativa.nombre AS situacion_operativa, chofer.licencia, ";
        $query .= "(SELECT fecha_inicial FROM circulacion_eventual WHERE fecha_final >= '". date('Y-m-d') ."' AND hora_final >= '". date('H:i:s') ."' AND chofer_vehiculo_id = chofer_vehiculo.id) AS fecha_inicial, ";
        $query .= "(SELECT fecha_final FROM circulacion_eventual WHERE fecha_final >= '". date('Y-m-d') ."' AND hora_final >= '". date('H:i:s') ."' AND chofer_vehiculo_id = chofer_vehiculo.id) AS fecha_final, ";
        $query .= "(SELECT hora_inicial FROM circulacion_eventual WHERE fecha_final >= '". date('Y-m-d') ."' AND hora_final >= '". date('H:i:s') ."' AND chofer_vehiculo_id = chofer_vehiculo.id) AS hora_inicial, ";
        $query .= "(SELECT hora_final FROM circulacion_eventual WHERE fecha_final >= '". date('Y-m-d') ."' AND hora_final >= '". date('H:i:s') ."' AND chofer_vehiculo_id = chofer_vehiculo.id) AS hora_final, ";
        $query .= "(SELECT aprobado FROM circulacion_eventual WHERE fecha_final >= '". date('Y-m-d') ."' AND hora_final >= '". date('H:i:s') ."' AND chofer_vehiculo_id = chofer_vehiculo.id) AS aprobado, ";
        $query .= "(SELECT pendiente FROM circulacion_eventual WHERE fecha_final >= '". date('Y-m-d') ."' AND hora_final >= '". date('H:i:s') ."' AND chofer_vehiculo_id = chofer_vehiculo.id) AS pendiente, ";
        $query .= "(SELECT tarea FROM circulacion_eventual WHERE fecha_final >= '". date('Y-m-d') ."' AND hora_final >= '". date('H:i:s') ."' AND chofer_vehiculo_id = chofer_vehiculo.id) AS tarea, ";
        $query .= "(SELECT circulacion_eventual_tipo_id FROM circulacion_eventual WHERE fecha_final >= '". date('Y-m-d') ."' AND hora_final >= '". date('H:i:s') ."' AND chofer_vehiculo_id = chofer_vehiculo.id) AS circulacion_eventual_tipo, ";
        $query .= "(SELECT id FROM circulacion_eventual WHERE fecha_final >= '". date('Y-m-d') ."' AND hora_final >= '". date('H:i:s') ."' AND chofer_vehiculo_id = chofer_vehiculo.id) AS circulacion_eventual_id ";
        $query .= "FROM vehiculo ";
        $query .= "INNER JOIN matricula ON matricula.id = vehiculo.matricula_id ";
        $query .= "INNER JOIN marca ON marca.id = vehiculo.marca_id ";
        $query .= "INNER JOIN modelo ON modelo.id = vehiculo.modelo_id ";
        $query .= "INNER JOIN vehiculo_tipo ON vehiculo_tipo.id = vehiculo.vehiculo_tipo_id ";
        $query .= "INNER JOIN chofer_vehiculo ON vehiculo.id = chofer_vehiculo.vehiculo_id ";
        $query .= "INNER JOIN circulacion_eventual ON chofer_vehiculo.id = circulacion_eventual.chofer_vehiculo_id ";
        $query .= "INNER JOIN circulacion_eventual_tipo ON circulacion_eventual_tipo.id = circulacion_eventual.circulacion_eventual_tipo_id ";
        $query .= "INNER JOIN area_parqueo ON area_parqueo.id = vehiculo.area_parqueo_id ";
        $query .= "INNER JOIN chofer ON chofer.id = chofer_vehiculo.chofer_id ";
        $query .= "INNER JOIN trabajador ON trabajador.id = chofer.trabajador_id ";
        $query .= "INNER JOIN area ON  area.id = vehiculo. area_id ";
        $query .= "INNER JOIN unidad_organizativa ON  unidad_organizativa.id = area. unidad_organizativa_id ";
        $query .= "INNER JOIN situacion_operativa_vehiculo ON  situacion_operativa_vehiculo.vehiculo_id = vehiculo.id ";
        $query .= "INNER JOIN situacion_operativa ON  situacion_operativa.id = situacion_operativa_vehiculo.situacion_operativa_id ";
        $query .= "WHERE unidad_organizativa.id = '".$uo_id."' AND  situacion_operativa.nombre = ('trabajando') AND circulacion_eventual_tipo.nombre = ('ordinaria') ";

        $fetch = $this->getEntityManager()->getConnection()->fetchAll($query);

        $circulacion_eventual_ordinaria = array();

        foreach ($fetch as $value) {
            $circulacion_eventual_ordinaria[] = array(
                'chapa' => $value['chapa'],
                'chofer' => $value['chofer'],
                'unidad_organizativa' => $value['unidad_organizativa'],
               	'marca' => $value['marca'],
               	'modelo' => $value['modelo'],
                'tipo_vehiculo' => $value['tipo_vehiculo'],
                'licencia' => $value['licencia'],
                'fecha_inicial' => $value['fecha_inicial'],
                'fecha_final' => $value['fecha_final'],
              	'hora_inicial' => $value['hora_inicial'],
                'hora_final' => $value['hora_final'],
                'aprobado' => $value['aprobado'],
                'pendiente' => $value['pendiente'],
                'tarea' => $value['tarea'],
                'circulacion_eventual_tipo' => $value['circulacion_eventual_tipo'],
                'matricula_id' => $value['matricula_id'],
                'circulacion_eventual_id' => $value['circulacion_eventual_id'],
                'chofer_vehiculo_id' => $value['chofer_vehiculo_id']
            );
        }
        return $circulacion_eventual_ordinaria;
    }
}