<?php
/**
 * Created by PhpStorm.
 * User: Dhia
 * Date: 18/01/2019
 * Time: 11:59
 */

namespace Esprit\ReservationBundle\Controller;


use Esprit\ReservationBundle\Entity\Reservation;
use Esprit\ReservationBundle\Form\ReservationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ReservationController extends Controller
{
    public function AjouterReservationAction(Request $request)
    {
        $reservation=new Reservation();
        $form=$this->createForm(ReservationType::class,$reservation);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush();
            return $this->redirectToRoute('esprit_reservation_ajouterreservation');
        }
        return $this->render('@EspritReservation/Reservation/Ajouter.html.twig',array(
            'form'=>$form->createView()
        ));
    }

}