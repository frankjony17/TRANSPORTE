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

    /**
     * @Route("add")
     */
    public function addAction(Request $rq)
    {
        if ($rq->getMethod() == 'POST')
        {
            $em = $this->getDoctrine()->getManager();
            $ut = $this->get('otros.util');

            $entity = new ChoferVehiculo();
            $entity->setPermanente($ut->boolean($rq->get("Permanente")));
            $entity->setChofer($em->find('TransporteBundle:Chofer', $rq->get("ChoferId")));
            $entity->setVehiculo($em->find('TransporteBundle:Vehiculo', $rq->get("VehiculoId")));

            return new Response($this->get('otros.util')->validate($entity));
        }
        throw $this->createNotFoundException('Esta acción no está permitida.');
    }

    /**
     * @Route("edit")
     */
    public function editAction(Request $rq)
    {
        if ($rq->getMethod() == 'POST')
        {
            $em = $this->getDoctrine()->getManager();
            $ut = $this->get('otros.util');

            $entity = $em->getRepository('TransporteBundle:ChoferVehiculo')->find($rq->get("Id"));
            $entity->setPermanente($ut->boolean($rq->get("Permanente")));
            $entity->setChofer($em->find('TransporteBundle:Chofer', $rq->get("ChoferId")));
            $entity->setVehiculo($em->find('TransporteBundle:Vehiculo', $rq->get("VehiculoId")));

            return new Response($this->get('otros.util')->validate($entity));
        }
        throw $this->createNotFoundException('Esta acción no está permitida.');
    }

    /**
     * @Route("remove")
     */
    public function removeAction(Request $rq)
    {
        if ($rq->getMethod() == 'POST')
        {   // Borrar entidades a partir de un identificador...
            return new Response($this->get('otros.util')->remove($rq->get("ids"), 'TransporteBundle:ChoferVehiculo'));
        }
        throw $this->createNotFoundException('Esta acción no está permitida.');
    }
}