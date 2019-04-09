<?php

namespace Transporte\TransporteBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ChoferVehiculoRepository extends EntityRepository
{
    /**
     * Listar todos los choferes-vehiculos de la Unidad Organizativa actual.
     *
     * @param type $uo_id ID de la Unidad Organizativa del usuario logeado en el sistema.
     *
     * @return Object
     */
    public function findChoferesVehiculos($uo_id)
    {
        $query = $this
            ->getEntityManager()
            ->createQuery('SELECT cv FROM TransporteBundle:ChoferVehiculo cv '.
                'JOIN cv.vehiculo v JOIN v.area a JOIN a.unidadOrganizativa uo WHERE uo.id = :id');
        $query->setParameter('id', $uo_id);

        return $query->getResult(\Doctrine\ORM\Query::HYDRATE_OBJECT);
    }
}