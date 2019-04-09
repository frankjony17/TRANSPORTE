<?php

namespace Transporte\TransporteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Transporte\TransporteBundle\Entity\AreaParqueo;

/**
 * @Route("area_parqueo/")
 */
class AreaParqueoController extends Controller
{
    /**
     * @Route("list")
     */
    public function listAction()
    {
        $data = $this->get('otros.util')->toArray($this->getDoctrine()->getManager()->getRepository('TransporteBundle:AreaParqueo')->findBy(array(
            'unidadOrganizativa' => $this->get('session')->get('unidad_organizativa_id')
        )));
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

            $entity = new AreaParqueo();
            $entity->setNombre($rq->get("Nombre"));
            $entity->setTelefonos($rq->get("Telefonos"));
            $entity->setDireccion($rq->get("Direccion"));
            
            if (is_numeric($rq->get("AreaParqueoTipo"))){
                $entity->setAreaParqueoTipo($em->getRepository('TransporteBundle:AreaParqueoTipo')->find($rq->get("AreaParqueoTipo")));
            }
            $entity->setUnidadOrganizativa($this->getDoctrine()->getManager()->find('NomencladorBundle:UnidadOrganizativa', $this->get('session')->get('unidad_organizativa_id')));

            return new Response($this->get('otros.util')->validate($entity));
        }
        throw $this->createNotFoundException('Esta acción no esta permitida.');
    }
    
    /**
     * @Route("edit")
     */ 
    public function editAction(Request $rq)
    {
        $em = $this->getDoctrine()->getManager();

        if ($rq->getMethod() == 'POST')
        {      
            $entity = $this->getDoctrine()->getManager()->getRepository('TransporteBundle:AreaParqueo')->find($rq->get("Id"));

            $entity->setNombre($rq->get("Nombre"));
            $entity->setTelefonos($rq->get("Telefonos"));
            $entity->setDireccion($rq->get("Direccion"));
            
            if (is_numeric($rq->get("AreaParqueoTipo"))){
                $entity->setAreaParqueoTipo($em->getRepository('TransporteBundle:AreaParqueoTipo')->find($rq->get("AreaParqueoTipo")));
            }

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
            return new Response($this->get('otros.util')->remove($rq->get("ids"), 'TransporteBundle:AreaParqueo'));
        } 
        throw $this->createNotFoundException('Esta acción no esta permitida.');             
    }
}
