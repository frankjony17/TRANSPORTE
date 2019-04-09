<?php

namespace Transporte\TransporteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Transporte\TransporteBundle\Entity\ChoferVehiculo;
//use Transporte\TransporteBundle\Entity\Chofer;
//use Transporte\TransporteBundle\Entity\Vehiculo;

/**
 * @Route("chofer_vehiculo/")
 */
class ChoferVehiculoController extends Controller
{
    /**
     * @Route("list")
     */
    public function listAction()
    {
        $data = $this->get('otros.util')->toArray($this->getDoctrine()->getManager()->getRepository('TransporteBundle:ChoferVehiculo')->findChoferesVehiculos($this->get('session')->get('unidad_organizativa_id')));

        return new Response('({"total":"'.count($data).'","data":'.json_encode($data).'})');
    }

//    /**
//     * @Route("add")
//     */
//    public function addAction(Request $rq)
//    {
//        if ($rq->getMethod() == 'POST')
//        {
//            $em = $this->getDoctrine()->getManager();
//
//            $matricula = new Matricula();
//            $matricula->setId($rq->get("ID"));
//            $matricula->setChapa($rq->get("Chapa"));
//            $matricula->setChapaVieja($rq->get("ChapaVieja"));
//            $matricula->setCirculacion($rq->get("Circulacion"));
//            ($rq->get("Vencimiento")) ? $matricula->setVencimiento(new \DateTime($rq->get("Vencimiento"))) : \NULL;
//
//            if ($em->getRepository('TransporteBundle:Vehiculo')->findUnicos($rq->get("ID"), $rq->get("Chapa"), $rq->get("ChapaVieja"), $rq->get("Circulacion")))
//            {
//                $em->persist($matricula);
//                $vehiculo = new Vehiculo();
//
//                if (is_numeric($rq->get("Marca"))){
//                    $vehiculo->setMarca($em->getRepository('TransporteBundle:Marca')->find($rq->get("Marca")));
//                }
//                if (is_numeric($rq->get("Modelo"))){
//                    $vehiculo->setModelo($em->getRepository('TransporteBundle:Modelo')->find($rq->get("Modelo")));
//                }
//                if (is_numeric($rq->get("VehiculoTipo"))){
//                    $vehiculo->setVehiculoTipo($em->getRepository('TransporteBundle:VehiculoTipo')->find($rq->get("VehiculoTipo")));
//                }
//                $vehiculo->setMatricula($matricula);
//                $vehiculo->setArea($em->getRepository('NomencladorBundle:Area')->find($rq->get("Area")));
//                $vehiculo->setAreaParqueo($em->getRepository('TransporteBundle:AreaParqueo')->find($rq->get("AreaParqueo")));
//
//                $em->persist($vehiculo);
//                return new Response($em->flush());
//            }
//            return new Response('Unico');
//        }
//        throw $this->createNotFoundException('Esta acción no esta permitida.');
//    }
//
//    /**
//     * @Route("edit")
//     */
//    public function editAction(Request $rq)
//    {
//        if ($rq->getMethod() == 'POST')
//        {
//            $em = $this->getDoctrine()->getManager();
//            $utiles = $this->get('otros.util');
//
//            $entity = $em->getRepository('TransporteBundle:Vehiculo')->find($rq->get("Id"));
//
//            if (is_numeric($rq->get("Marca"))){
//                $entity->setMarca($em->getRepository('TransporteBundle:Marca')->find($rq->get("Marca")));
//            }
//            if (is_numeric($rq->get("Modelo"))){
//                $entity->setModelo($em->getRepository('TransporteBundle:Modelo')->find($rq->get("Modelo")));
//            }
//            if (is_numeric($rq->get("Tipo"))){
//                $entity->setVehiculoTipo($em->getRepository('TransporteBundle:VehiculoTipo')->find($rq->get("Tipo")));
//            }
//
//            $entity->setMatricula($utiles->entity('TransporteBundle:Matricula', 'chapa', $rq->get("Chapa")));
//            $entity->setAreaParqueo($utiles->entity('TransporteBundle:AreaParqueo', 'nombre', $rq->get("AreaParqueo")));
//            $entity->setArea($utiles->entity('NomencladorBundle:Area', 'nombre', $rq->get("Area")));
//
//            return new Response($utiles->validate($entity));
//        }
//        throw $this->createNotFoundException('Esta acción no esta permitida.');
//    }
//
//    /**
//     * @Route("remove")
//     */
//    public function removeAction(Request $rq)
//    {
//        if ($rq->getMethod() == 'POST')
//        {   // Borrar entidades a partir de un identificador...
//            return new Response($this->get('otros.util')->remove($rq->get("ids"), 'TransporteBundle:Vehiculo'));
//        }
//        throw $this->createNotFoundException('Esta acción no esta permitida.');
//    }
}