<?php

namespace Transporte\TransporteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Transporte\TransporteBundle\Entity\Marca;

/**
 * @Route("marca/")
 */
class MarcaController extends Controller
{
    /**
     * @Route("list")
     */
    public function listAction()
    {
        $data = $this->get('otros.util')->toArray($this->getDoctrine()->getManager()->getRepository('TransporteBundle:Marca')->findAll());

        return new Response('({"total":"'.count($data).'","data":'.json_encode($data).'})');
    }

    /**
     * @Route("add")
     */
    public function addAction(Request $rq)
    {
        if ($rq->getMethod() == 'POST')
        {
            $entity = new Marca();
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
            $entity = $this->getDoctrine()->getManager()->getRepository('TransporteBundle:Marca')->find($rq->get("Id"));

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
            return new Response($this->get('otros.util')->remove($rq->get("ids"), 'TransporteBundle:Marca'));
        }
        throw $this->createNotFoundException('Esta acción no esta permitida.');
    }
}