<?php

namespace Transporte\TransporteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Transporte\TransporteBundle\Entity\VehiculoTipo;

/**
 * @Route("vehiculo_tipo/")
 */
class VehiculoTipoController extends Controller
{
    /**
     * @Route("list")
     */
    public function listAction()
    {
        $data = $this->get('otros.util')->toArray($this->getDoctrine()->getManager()->getRepository('TransporteBundle:VehiculoTipo')->findAll());

        return new Response('({"total":"'.count($data).'","data":'.json_encode($data).'})');
    }

    /**
     * @Route("add")
     */
    public function addAction(Request $rq)
    {
        if ($rq->getMethod() == 'POST')
        {
            $entity = new VehiculoTipo();
            $entity->setNombre($rq->get("Nombre"));
            $entity->setDescripcion($rq->get("Descripcion"));

            return new Response($this->get('otros.util')->validate($entity));
        }
        throw $this->createNotFoundException('Esta acción no esta permitida.');
    }

    /**
     * @Route("edit")
     */
    public function editAction(Request $rq)
    {
        if ($rq->getMethod() == 'POST')
        {
            $entity = $this->getDoctrine()->getManager()->getRepository('TransporteBundle:VehiculoTipo')->find($rq->get("Id"));

            $entity->setNombre($rq->get("Nombre"));
            $entity->setDescripcion($rq->get("Descripcion"));

            return new Response($this->get('otros.util')->validate($entity));
        }
        throw $this->createNotFoundException('Esta acción no esta permitida.');
    }

    /**
     * @Route("remove")
     */
    public function removeAction(Request $rq)
    {
        if ($rq->getMethod() == 'POST')
        {
            return new Response($this->get('otros.util')->remove($rq->get("ids"), 'TransporteBundle:VehiculoTipo'));
        }
        throw $this->createNotFoundException('Esta acción no esta permitida.');
    }
}