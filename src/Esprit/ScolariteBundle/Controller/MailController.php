<?php
/**
 * Created by PhpStorm.
 * User: Dhia
 * Date: 28/02/2019
 * Time: 14:45
 */

namespace CinemaBundle\Controller;


use CinemaBundle\Entity\Mail;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MailController
 * @Route("")
 */
class MailController extends Controller
{
    /**
     * @Route("/mail")
     */
    public function SendAction(Request $request)
    {
        $mail = new Mail();
        $form = $this->createForm('Esprit\ScolariteBundle\Form\MailType', $mail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $subject = $mail->getSubject();
            $mail = $mail->getMail();
            $objet = $request->get('form')['objet'];
            $username = 'sediridhia@gmail.com';
            $message=\swift_Message::newInstance()
                ->SetSubject($subject)
                ->setFrom($username)
                ->setTo($mail)
                ->setBody($objet);
            $this->get('mailer')->send($message);
            $this->get('session')->getFlashBag()->add('notice', 'Message envoyé avec success');
            $this->redirectToRoute('send_mail');
        }

        return $this->render('@EspritScolariteBundle/Mail/send_mail.html.twig', array('f' => $form->createView()));
    }

}