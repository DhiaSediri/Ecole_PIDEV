<?php
/**
 * Created by PhpStorm.
 * User: Dhia
 * Date: 17/01/2019
 * Time: 15:02
 */

namespace Esprit\ProjetEtudiantBundle\Controller;


use Esprit\ProjetEtudiantBundle\Entity\Etudiant;
use Esprit\ProjetEtudiantBundle\Form\EtudiantType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EtudiantController extends Controller
{
    public function AjouterEtudiantAction(Request $request)
    {
        $etudiant=new Etudiant();
        $form=$this->createForm(EtudiantType::class,$etudiant);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($etudiant);
            $em->flush();
            return $this->redirectToRoute('esprit_Projet_Etudiant_ajouter_Projet');
        }
        return $this->render('@EspritProjetEtudiant/Etudiant/Ajouter.html.twig',array());
    }
}