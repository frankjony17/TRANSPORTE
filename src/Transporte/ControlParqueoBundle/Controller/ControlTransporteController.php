<?php

namespace Transporte\ControlParqueoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Validator\Constraints\DateTime;
use Transporte\ControlParqueoBundle\Entity\ControlTransporte;

/**
 * @Route("control_transporte/")
 */
class ControlTransporteController extends Controller
{
	/**
     * @Route("list")
     */
    public function listAction()
    {
        $data = $this->getDoctrine()->getManager()->getRepository('ControlParqueoBundle:ControlTransporte')->findVehiculosTrabajando($this->get('session')->get('unidad_organizativa_id'));
        
        return new Response('({"total":"'.count($data).'","data":'.json_encode($data).'})');
    }

    /**
     * @Route("edit_add")
     * @param Request $rq
     * @return Response
     */
    public function editAddAction(Request $rq)
    {
        $count = 0;
        $em = $this->getDoctrine()->getManager();
        foreach (json_decode($rq->get('data')) as $data) {
            if (is_numeric($data[0])) {
                $entity = $em->getRepository('ControlParqueoBundle:ControlTransporte')->find($data[0]);
            } else {
                $entity = new ControlTransporte();
                $entity->setFecha(new \DateTime(date("Y-m-d")));
            }
            $time1 = null;
            $time2 = null;
            if(is_string($data[1]) && $data[1] !== '') {
                $time1 = new \DateTime($data[1]);
            }
            if(is_string($data[2]) && $data[2] !== '') {
                $time2 = new \DateTime($data[2]);
            }
            $entity->setHoraSalida($time1);
            $entity->setHoraEntrada($time2);
            $entity->setAutorizado($data[3] !== true ? false : true);
            $entity->setObservaciones($data[4]);
            $entity->setChoferVehiculo($em->getRepository('TransporteBundle:ChoferVehiculo')->find($data[5]));

            if ($entity->getHoraEntrada() === null || $entity->getHoraSalida() === null) {
                $em->persist($entity);
                $em->flush();
            }
            if ($entity->getHoraEntrada() !== null && $entity->getHoraSalida() !== null) {
                if (intval($data[2]) > intval($data[1])) {
                    $em->persist($entity);
                    $em->flush();
                } else {
                    ++$count;
                }
            }
        }
        return new Response($count);
    }

}