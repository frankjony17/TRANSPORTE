<?php

namespace Transporte\TransporteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Transporte\TransporteBundle\Entity\AreaParqueoTipo;

/**
 * @Route("area_parqueo_tipo/")
 */
class AreaParqueoTipoController extends Controller
{
    /**
     * @Route("list")
     */
    public function listAction()
    {
        $data = $this->get('otros.util')->toArray($this->getDoctrine()->getManager()->getRepository('TransporteBundle:AreaParqueoTipo')->findAll());

        return new Response('({"total":"'.count($data).'","data":'.json_encode($data).'})');
    }

}