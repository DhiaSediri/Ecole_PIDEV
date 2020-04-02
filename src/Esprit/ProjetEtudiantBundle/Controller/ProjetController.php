<?php
/**
 * Created by PhpStorm.
 * User: Dhia
 * Date: 17/01/2019
 * Time: 14:20
 */

namespace Esprit\ProjetEtudiantBundle\Controller;


use Esprit\ProjetEtudiantBundle\Entity\Projet;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjetController extends Controller
{
    public function AfficherProjetAction()
    {
        $projet=$this->getDoctrine()->getRepository(Projet::class)->findAll();
        return $this->render('@EspritProjetEtudiant/Projet/Afficher.html.twig',array('projets'=>$projet));
    }

    public function SupprimerProjetAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $projet=$em->getRepository(Projet::class)->find($id);
        $em->remove($projet);
        $em->flush();
        return $this->redirectToRoute('esprit_Projet_Etudiant_afficher_Projet');
    }
}