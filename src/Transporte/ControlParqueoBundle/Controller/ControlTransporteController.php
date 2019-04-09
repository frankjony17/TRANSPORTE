<?php

namespace Transporte\ControlParqueoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

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
     */
    public function editAddAction(Request $rq)
    {
        if ($rq->getMethod() == 'POST')
        {
            $em = $this->getDoctrine()->getManager();

            foreach (json_decode($rq->get('myData')) as $myData) {
                if (is_numeric($myData[0])) {
                
                    $entity = $em->getRepository('ControlParqueoBundle:ControlTransporte')->find($rq->get("Id"));

                    $entity->setFecha(new \DateTime($rq->get("Fecha")));
                    $entity->setHoraSalida(new \DateTime($rq->get("HoraSalida")));
                    $entity->setHoraEntrada(new \DateTime($rq->get("HoraEntrada")));
                    $entity->setAutorizado($rq->get("Autorizado"));
                    $entity->setObservaciones($rq->get("Observaciones"));
                    //falta area de parqueo
                    //falta agente 
                               
                } else {
                
                    $entity = new ControlTransporte();
                    $entity->setFecha(new \DateTime($rq->get("Fecha")));
                    $entity->setHoraSalida(new \DateTime($rq->get("HoraSalida")));
                    $entity->setHoraEntrada(new \DateTime($rq->get("HoraEntrada")));
                    $entity->setAutorizado($rq->get("Autorizado"));
                    $entity->setObservaciones($rq->get("Observaciones"));
                    //falta area de parqueo
                    //falta agente
                }
                $em->persist($entity);
                // return new Response($this->get('otros.util')->validate($entity));
            }
            return new Response($em->flush());
        }
    }

}