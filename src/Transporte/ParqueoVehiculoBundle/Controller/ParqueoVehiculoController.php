<?php

namespace Transporte\ParqueoVehiculoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Transporte\ParqueoVehiculoBundle\Entity\ParqueoVehiculo;

/**
 * @Route("parqueo_vehiculo/")
 */
class ParqueoVehiculoController extends Controller
{
	/**
     * @Route("listeventual")
     */
    public function listEventualAction()
    {
        $data = $this->getDoctrine()->getManager()->getRepository('ParqueoVehiculoBundle:ParqueoVehiculo')->findVehiculosParqueoEventual($this->get('session')->get('unidad_organizativa_id'));
        
        return new Response('({"total":"'.count($data).'","data":'.json_encode($data).'})');
    }

    /**
     * @Route("listpermanente")
     */
    public function listPermanenteAction()
    {
        $data = $this->getDoctrine()->getManager()->getRepository('ParqueoVehiculoBundle:ParqueoVehiculo')->findVehiculosParqueoPermanente($this->get('session')->get('unidad_organizativa_id'));
        
        return new Response('({"total":"'.count($data).'","data":'.json_encode($data).'})');
    }

    // /**
    //  * @Route("edit_add")
    //  */
    // public function editAddAction(Request $rq)
    // {
    //     if ($rq->getMethod() == 'POST')
    //     {
    //         $em = $this->getDoctrine()->getManager();

    //         foreach (json_decode($rq->get('myData')) as $myData) {
    //             if (is_numeric($myData[0])) {
                
    //                 $entity = $em->getRepository('CirculacionEventualBundle:CirculacionEventual')->find($rq->get("Id"));

    //                 $entity->setFechaInicial(new \DateTime($rq->get("FechaInicial")));
    //                 $entity->setFechaFinal(new \DateTime($rq->get("FechaFinal")));
    //                 $entity->setHoraInicial(new \DateTime($rq->get("HoraInicial")));
    //                 $entity->setHoraFinal(new \DateTime($rq->get("HoraFinal")));
    //                 $entity->setAprobado($rq->get("Aprobado"));
    //                 $entity->setPendiente($rq->get("Pendiente"));
    //                 $entity->setTarea($rq->get("Tarea"));
    //                 $entity->setCirculacionEventualTipo($rq->get("CirculacionEventualTipo"));
    //                 //falta poblado
    //                 //falta area de parqueo
                     
                               
    //             } else {
                
    //                 $entity = new CirculacionEventual();
    //                 $entity->setFechaInicial(new \DateTime($rq->get("FechaInicial")));
    //                 $entity->setFechaFinal(new \DateTime($rq->get("FechaFinal")));
    //                 $entity->setHoraInicial(new \DateTime($rq->get("HoraInicial")));
    //                 $entity->setHoraFinal(new \DateTime($rq->get("HoraFinal")));
    //                 $entity->setAprobado($rq->get("Aprobado"));
    //                 $entity->setPendiente($rq->get("Pendiente"));
    //                 $entity->setTarea($rq->get("Tarea"));
    //                 $entity->setCirculacionEventualTipo($rq->get("CirculacionEventualTipo"));
    //                 //falta poblado
    //                 //falta area de parqueo
    //             }
    //             $em->persist($entity);
    //             // return new Response($this->get('otros.util')->validate($entity));
    //         }
    //         return new Response($em->flush());
    //     }
    // }	
}