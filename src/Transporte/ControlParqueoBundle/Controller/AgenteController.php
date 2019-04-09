<?php

namespace Transporte\ControlParqueoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Transporte\ControlParqueoBundle\Entity\Agente;

/**
 * @Route("agente/")
 */
class AgenteController extends Controller
{
    /**
     * @Route("list")
     */
    public function listAction()
    {
        $data = $this->get('otros.util')->toArray($this->getDoctrine()->getManager()->getRepository('ControlParqueoBundle:Agente')->findAll());

        return new Response('({"total":"'.count($data).'","data":'.json_encode($data).'})');
    }

    /**
     * @Route("add")
     */
    public function addAction(Request $rq)
    {
        if ($rq->getMethod() == 'POST')
        {
            $entity = new Agente();
            $entity->setNombreApellidos($rq->get("NombreApellidos"));

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
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ControlParqueoBundle:Agente')->find($rq->get("Id"));

            $entity->setNombreApellidos($rq->get("NombreApellidos"));

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
            return new Response($this->get('otros.util')->remove($rq->get("ids"), 'ControlParqueoBundle:Agente'));
        }
        throw $this->createNotFoundException('Esta acción no esta permitida.');
    }
}