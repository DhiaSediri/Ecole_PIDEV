<?php

namespace Esprit\ProjetEtudiantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('EspritProjetEtudiantBundle:Default:index.html.twig');
    }
}
