<?php
/**
 * Created by PhpStorm.
 * User: Dhia
 * Date: 31/10/2018
 * Time: 15:42
 */

namespace Esprit\EspritParcBundle\Controller;


use Esprit\EspritParcBundle\Entity\Voiture;
use Esprit\EspritParcBundle\Form\rechercheVoitureForm;
use Esprit\EspritParcBundle\Form\VoitureType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class VoituresController extends Controller
{

    public function afficherVoitureAction( )
    {
        $voitures= $this->getDoctrine()->getRepository(Voiture::class)->findAll();
        return $this->render('@EspritEspritParc/Voitures/afficherVoiture.html.twig',array('voitures'=>$voitures));
    }
    public function ajouterVoitureAction(Request $request)
    {
        $voiture=new Voiture();
        $form=$this->createForm(VoitureType::class,$voiture);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($voiture);
            $em->flush();
            return $this->redirectToRoute('esprit_esprit_parc_afficher_Voiture');
        }
        return $this->render('@EspritEspritParc/Voitures/ajouterVoiture.html.twig',array(
            'form'=>$form->createView()
        ));
    }

    public function modifierVoitureAction(Request $request,$id)
    {
        $voiture= $this->getDoctrine()->getRepository(Voiture::class)->find($id);
        $form= $this->createForm(VoitureType::class,$voiture);
        $form->handleRequest($request);
        if ($form->isSubmitted())
        {
            $em= $this->getDoctrine()->getManager();
            $em->persist($voiture);
            $em->flush();
            return $this->redirectToRoute('esprit_esprit_parc_afficher_Voiture');
        }
        return $this->render('@EspritEspritParc/Voitures/modifierVoiture.html.twig',array(
            'form'=>$form->createView()));
    }

    public function supprimerVoitureAction($id)
    {
        $em= $this->getDoctrine()->getManager();
        $voiture= $this->getDoctrine()->getRepository(Voiture::class)->find($id);
        $em->remove($voiture);
        $em->flush();
        return $this->redirectToRoute('esprit_esprit_parc_afficher_Voiture');
    }

    public function chercherVoitureAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $voitures=$em->getRepository(Voiture::class)->findAll();
        if ($request->isMethod('POST'))
        {
            $serie = $request->get('serie');
            $voitures = $em->getRepository(Voiture::class)->findBy(array('serie'=>$serie));
        }
        return $this->render('@EspritEspritParc/Voitures/chercherVoiture.html.twig',array('voitures'=>$voitures));
    }

    public function rechercheSerieDQLAction(Request $request)
    {
        $voiture = new Voiture();
        $em = $this->getDoctrine()->getManager();
        $voitures = $em->getRepository(Voiture::class)->findAll();
        $Form = $this->createForm(rechercheVoitureForm::class,$voiture);
        $Form->handleRequest($request);
        if($Form->isValid())
        {
            $serie = $voiture->getSerie();
            $voitures = $em->getRepository(Voiture::class)->findSerieDQL($serie);
        }

        return $this->render('@EspritEspritParc/Voitures/rechercheSerie.html.twig',
            array('Form'=>$Form->createView(),'voitures'=>$voitures));
    }
}