<?php

namespace Transporte\ControlParqueoBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ControlTransporteRepository extends EntityRepository
{
	/**
     * Listar todos los vehículos de la Unidad Organizativa actual que esten trabajando en la fecha actual.
     * 
     * @param type $uo_id
     * 
     * @return Object
     */
    public function findVehiculosTrabajando($uo_id)
    {
        $query = "SELECT DISTINCT ON (matricula.chapa) matricula.chapa, matricula_id, trabajador.nombre_apellidos AS chofer, area_parqueo.nombre AS area_parqueo, area.nombre AS area, unidad_organizativa.acronimo AS unidad_organizativa, chofer_vehiculo.id AS chofer_vehiculo_id, situacion_operativa.nombre AS situacion_operativa, ";
        $query .= "(SELECT hora_entrada FROM control_transporte WHERE fecha = '". date('Y-m-d') ."' AND chofer_vehiculo_id = chofer_vehiculo.id) AS hora_entrada, ";
        $query .= "(SELECT hora_salida FROM control_transporte WHERE fecha = '". date('Y-m-d') ."' AND chofer_vehiculo_id = chofer_vehiculo.id) AS hora_salida, ";
        $query .= "(SELECT autorizado FROM control_transporte WHERE fecha = '". date('Y-m-d') ."' AND chofer_vehiculo_id = chofer_vehiculo.id) AS autorizado, ";
        $query .= "(SELECT observaciones FROM control_transporte WHERE fecha = '". date('Y-m-d') ."' AND chofer_vehiculo_id = chofer_vehiculo.id) AS observaciones, ";
        $query .= "(SELECT fecha FROM control_transporte WHERE fecha = '". date('Y-m-d') ."' AND chofer_vehiculo_id = chofer_vehiculo.id) AS fecha, ";
        $query .= "(SELECT id FROM control_transporte WHERE fecha = '". date('Y-m-d') ."' AND chofer_vehiculo_id = chofer_vehiculo.id) AS control_transporte_id, ";
        $query .= "chofer.hora_parqueo FROM vehiculo ";
        $query .= "INNER JOIN matricula ON matricula.id = vehiculo.matricula_id ";
        $query .= "INNER JOIN chofer_vehiculo ON vehiculo.id = chofer_vehiculo.vehiculo_id ";
        $query .= "INNER JOIN area_parqueo ON area_parqueo.id = vehiculo.area_parqueo_id ";
        $query .= "INNER JOIN chofer ON chofer.id = chofer_vehiculo.chofer_id ";
        $query .= "INNER JOIN trabajador ON trabajador.id = chofer.trabajador_id ";
        $query .= "INNER JOIN area ON  area.id = vehiculo. area_id ";
        $query .= "INNER JOIN unidad_organizativa ON  unidad_organizativa.id = area. unidad_organizativa_id ";
        $query .= "INNER JOIN situacion_operativa_vehiculo ON  situacion_operativa_vehiculo.vehiculo_id = vehiculo.id ";
        $query .= "INNER JOIN situacion_operativa ON  situacion_operativa.id = situacion_operativa_vehiculo.situacion_operativa_id ";
        $query .= "WHERE unidad_organizativa.id = '".$uo_id."' AND  situacion_operativa.nombre = ('trabajando') AND chofer_vehiculo.permanente = true";

        $fetch = $this->getEntityManager()->getConnection()->fetchAll($query);
        $control_transporte = array();
        foreach ($fetch as $value) {
            $hora_parqueo = new \DateTime($value['hora_parqueo']);
            $control_transporte[] = array(
                'chapa' => $value['chapa'],
                'chofer' => $value['chofer'],
                'area_parqueo' => $value['area_parqueo'],
                'area' => $value['area'],
                'unidad_organizativa' => $value['unidad_organizativa'],
                'hora_entrada' => $this->getValue($value['hora_entrada']),
                'hora_salida' => $this->getValue($value['hora_salida']),
                'hora_parqueo' => $hora_parqueo->format("H:i:s"),
                'fuera_tiempo' => $this->getTime($value['hora_entrada'], $value['hora_parqueo'])[0],
                'fuera_estado' => $this->getTime($value['hora_entrada'], $value['hora_parqueo'])[1],
                'autorizado' => $value['autorizado'],
                'observaciones' => $value['observaciones'],
                'fecha' => $value['fecha'],
                'matricula_id' => $value['matricula_id'],
                'control_transporte_id' => $value['control_transporte_id'],
                'chofer_vehiculo_id' => $value['chofer_vehiculo_id']
            );
        }
        return $control_transporte;
    }

    private function getValue($time) {
        if ($time) {
            $time = new \DateTime($time);
            $array = explode(":", $time->format("H:i:s"));
            return $array[0] . $array[1];
        }
        return $time;
    }

    private function getTime($horaEntrada, $horaParqueo) {
        if ($horaEntrada && $horaParqueo){
            $horaEntrada = new \DateTime($horaEntrada);
            $horaParqueo = new \DateTime($horaParqueo);
            $hora = $horaEntrada->diff($horaParqueo);

            if ($horaEntrada > $horaParqueo) {
                return  array(
                    $hora->format("%H:%I:%S"),
                    true
                );
            } else {
                return  array(
                    $hora->format("%H:%I:%S"),
                    false
                );
            }
        }
        return  array(
            '',
            false
        );
    }
}