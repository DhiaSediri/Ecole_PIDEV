<?php

namespace Esprit\ScolariteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
/**
 * Home controller.
 *
 * @Route("home")
 */
class DefaultController extends Controller
{
    /**
     * Lists all matiere entities.
     *
     * @Route("/", name="index")
     * @Method("GET")
     */
    public function indexAction()
    {
        return $this->render('@EspritScolariteBundle/Default/index.html.twig');
    }
}
