<?php

namespace Esprit\EspritParcBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@EspritEspritParc/Default/index.html.twig');
    }
}
