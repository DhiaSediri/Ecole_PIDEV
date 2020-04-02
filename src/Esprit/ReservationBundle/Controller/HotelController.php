<?php
/**
 * Created by PhpStorm.
 * User: Dhia
 * Date: 18/01/2019
 * Time: 11:39
 */

namespace Esprit\ReservationBundle\Controller;


use Esprit\ReservationBundle\Entity\Hotel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HotelController extends Controller
{
    public function AfficherHotelAction()
    {
        $hotel=$this->getDoctrine()->getRepository(Hotel::class)->findAll();
        return $this->render('@EspritReservation/Hotel/Afficher.html.twig',array('hotels'=>$hotel));
    }

    public function findHotelAction($lieu)
    {
        $em=$this->getDoctrine()->getManager();
        $hotels=$em->getRepository(Hotel::class)->findLieuxParameterDQL($lieu);
        return $this->render('@EspritReservation/Hotel/AfficheDQL.html.twig',array('hotels'=>$hotels));
    }
}