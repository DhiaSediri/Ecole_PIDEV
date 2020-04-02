<?php

namespace Esprit\ReservationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('EspritReservationBundle:Default:index.html.twig');
    }
}
