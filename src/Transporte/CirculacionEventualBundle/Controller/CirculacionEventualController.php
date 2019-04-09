<?php

namespace Transporte\CirculacionEventualBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Transporte\TransporteBundle\Entity\CirculacionEventual;

/**
 * @Route("circulacion_eventual/")
 */
class CirculacionEventualController extends Controller
{
	/**
     * @Route("list")
     */
    public function listAction()
    {
        $data = $this->getDoctrine()->getManager()->getRepository('CirculacionEventualBundle:CirculacionEventual')->findVehiculosCirculacionOrdinaria($this->get('session')->get('unidad_organizativa_id'));
        
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
                
                    $entity = $em->getRepository('CirculacionEventualBundle:CirculacionEventual')->find($rq->get("Id"));

                    $entity->setFechaInicial(new \DateTime($rq->get("FechaInicial")));
                    $entity->setFechaFinal(new \DateTime($rq->get("FechaFinal")));
                    $entity->setHoraInicial(new \DateTime($rq->get("HoraInicial")));
                    $entity->setHoraFinal(new \DateTime($rq->get("HoraFinal")));
                    $entity->setAprobado($rq->get("Aprobado"));
                    $entity->setPendiente($rq->get("Pendiente"));
                    $entity->setTarea($rq->get("Tarea"));
                    $entity->setCirculacionEventualTipo($rq->get("CirculacionEventualTipo"));
                    //falta poblado
                    //falta area de parqueo
                     
                               
                } else {
                
                    $entity = new CirculacionEventual();
                    $entity->setFechaInicial(new \DateTime($rq->get("FechaInicial")));
                    $entity->setFechaFinal(new \DateTime($rq->get("FechaFinal")));
                    $entity->setHoraInicial(new \DateTime($rq->get("HoraInicial")));
                    $entity->setHoraFinal(new \DateTime($rq->get("HoraFinal")));
                    $entity->setAprobado($rq->get("Aprobado"));
                    $entity->setPendiente($rq->get("Pendiente"));
                    $entity->setTarea($rq->get("Tarea"));
                    $entity->setCirculacionEventualTipo($rq->get("CirculacionEventualTipo"));
                    //falta poblado
                    //falta area de parqueo
                }
                $em->persist($entity);
                // return new Response($this->get('otros.util')->validate($entity));
            }
            return new Response($em->flush());
        }
    }
}