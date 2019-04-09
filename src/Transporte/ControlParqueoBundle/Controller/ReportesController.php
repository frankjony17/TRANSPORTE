<?php

namespace Transporte\ControlParqueoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("reporte/")
 */
class ReportesController extends Controller
{
    /**
     * @Route("control-transporte")
     * @param Request $rq
     * @return Response
     */
    public function controlTransporteAction(Request $rq)
    {
        $dataTemp = array(); $i = 0;
        $dataList = $this->getDoctrine()->getManager()->getRepository('ControlParqueoBundle:ControlTransporte')->findVehiculosTrabajando($this->get('session')->get('unidad_organizativa_id'));

        foreach ($dataList as $value) {
            $dataTemp[] = array(
                'no' => ++$i,
                'matricula' => $value['chapa'],
                'chofer' => $value['chofer'],
                'lugarParqueo' => $value['area_parqueo'],
                'horaSalida' => $value['hora_salida'],
                'horaEntrada' => $value['hora_entrada'],
                'observacion' => $value['observaciones']
            );
        }
        $arrayPDF = array(
            'uo' => $this->get('session')->get('nombre_unidad_organizativa'),
            'data' => $dataTemp
//            'agente' => '',
//            'areaParqueo' => ''
        );
        $html = $this->renderView('ControlParqueoBundle:Reportes:controlTransporte.html.twig', $arrayPDF);

        if (file_exists('pdf/control_transporte.pdf')) {
            @unlink('pdf/control_transporte.pdf');
        }
        $this->get('knp_snappy.pdf')->generateFromHtml($html, 'pdf/control_transporte.pdf', array(
            'orientation' => 'Portrait',
            'page-size' => 'Letter',
            'encoding' => 'UTF-8'
        ));
        return new Response('pdf/control_transporte.pdf');
    }
}