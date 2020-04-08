<?php

namespace Esprit\ScolariteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("")
 */
class SecurityController extends Controller
{
    /**
     * @Route("/add")
     */
    public function addAction()
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->createUser();
        
        return $this->render('EspritScolariteBundle:Security:user_home.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/test", name="testRole")
     */
    public function redirectAction(Request $request)
    {
        //$authChecker = $this->container->get('security.authorization_checker');

        if ($this->denyAccessUnlessGranted('["ROLE_ADMIN"]')){
            die('tes');
            return $this->render('@EspritScolarite:Security:user_home.html.twig');
        }


        elseif ($this->denyAccessUnlessGranted('ROLE_ADMIN')){

            return $this->render('@EspritScolarite:Security:admin_home.html.twig');
        }

        else{

            return $this->render('@FosUser:Security:login.html.twig');
        }
    }

}
