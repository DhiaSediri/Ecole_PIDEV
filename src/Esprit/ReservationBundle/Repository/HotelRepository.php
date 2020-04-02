<?php
/**
 * Created by PhpStorm.
 * User: Dhia
 * Date: 18/01/2019
 * Time: 12:12
 */

namespace Esprit\ReservationBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Esprit\ReservationBundle\Entity\Hotel;

class HotelRepository extends EntityRepository
{
    public function findLieuxParameterDQL($lieux)
    {
        $query = $this->getEntityManager()
            ->createQuery("SELECT m FROM EspritReservationBundle:Hotel m WHERE m.lieux =:Lieux ")
            ->setParameter('Lieux', $lieux);
        return $query->getResult();
    }

}