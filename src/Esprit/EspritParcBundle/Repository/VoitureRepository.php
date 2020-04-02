<?php
/**
 * Created by PhpStorm.
 * User: Dhia
 * Date: 05/11/2018
 * Time: 20:48
 */

namespace Esprit\EspritParcBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Esprit\EspritParcBundle\Entity\Voiture;

class VoitureRepository extends EntityRepository
{
    public function findSerieDQL($serie)
    {
        $query=$this->getEntityManager()
            ->createQuery("SELECT v FROM EspritEspritParcBundle:Voiture v where v.serie =:Serie
                                 ORDER BY v.DateMiseCirculation ASC")
            ->setParameter('Serie',$serie);
        return $query->getResult();
    }
}