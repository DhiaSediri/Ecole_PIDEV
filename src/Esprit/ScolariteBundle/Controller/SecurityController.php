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
     * @Route("/adduser")
     */
    public function addAction()
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->createUser();

        $user->setUsername('aaaaaaaa');
        $user->setRoles(array('ROLE_ADMIN'));
        $user->setEmail('aaaaaaaaa@gmail.com');
        $user->setPlainPassword('aaaaaaaaa');
        $user->setEnabled(true);
        $userManager->updateUser($user);

        return $this->forward('EspritScolariteBundle:Security:redirect');
    }

    /**
     * @Route("/test", name="testRole")
     */
    public function redirectAction(Request $request)
    {
        $authChecker = $this->container->get('security.authorization_checker');

        if($authChecker->isGranted('ROLE_ADMIN')){
            return $this->render('@EspritScolarite/Security/admin_home.html.twig');
        }
        elseif ($authChecker->isGranted('ROLE_USER')){
            return $this->render('@EspritScolarite/Security/user_home.html.twig');
        }
        else{
            return $this->render('@FosUser/Security/login.html.twig');
        }

        #if ($this->denyAccessUnlessGranted('["ROLE_ADMIN"]')){
            #return $this->render('@EspritScolarite:Security:user_home.html.twig');
        #}
        #elseif ($this->denyAccessUnlessGranted('ROLE_ADMIN')){
            #return $this->render('@EspritScolarite:Security:admin_home.html.twig');
        #}
        #else{
            #return $this->render('@FosUser:Security:login.html.twig');
        #}
    }

}
