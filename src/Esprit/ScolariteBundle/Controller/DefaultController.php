<?php

namespace Esprit\ScolariteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@EspritScolarite/Default/index.html.twig');
    }
}
