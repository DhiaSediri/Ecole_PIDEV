<?php
/**
 * Created by PhpStorm.
 * User: Dhia
 * Date: 05/11/2018
 * Time: 14:50
 */

namespace Esprit\EspritParcBundle\Repository;


use Doctrine\ORM\EntityRepository;
use Esprit\EspritParcBundle\Entity\Modele;

class ModeleRepository extends EntityRepository
{
    public function findPaysQB()
    {
        $query=$this->createQueryBuilder('s');
        $query->where("s.pays=:pays")
            ->setParameter('pays',"Allemagne");
        return $query->getQuery()->getResult();
    }

    public function findPaysDQL()
    {
        $query=$this->getEntityManager()
            ->createQuery("SELECT m FROM EspritEspritParcBundle:Modele m WHERE m.pays ='Allemagne' ");
        return $query->getResult();
    }

    public function findPaysParameterDQL($pays)
    {
        $query=$this->getEntityManager()
            ->createQuery("SELECT m FROM EspritEspritParcBundle:Modele m WHERE m.pays =:Pays ")
            ->setParameter('Pays',$pays);
        return $query->getResult();
    }

}