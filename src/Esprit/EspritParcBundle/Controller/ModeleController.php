<?php
/**
 * Created by PhpStorm.
 * User: Dhia
 * Date: 19/10/2018
 * Time: 16:14
 */

namespace Esprit\EspritParcBundle\Controller;


use Esprit\EspritParcBundle\Form\ModeleForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Esprit\EspritParcBundle\Entity\Modele;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Tests\Model;

class ModeleController extends Controller
{
    public function afficherModeleAction()
    {
        $modele=$this->getDoctrine()->getRepository(Modele::class)->findAll();
        return $this->render('@EspritEspritParc/Modele/afficherModele.html.twig',array('modeles'=>$modele));
    }

    public function ajouterModeleAction(Request $request)
    {
        $modele=new Modele();

        if($request->isMethod('Post'))
        {
            $modele->setLibelle($request->get('libelle'));
            $modele->setPays($request->get('pays'));
            $em=$this->getDoctrine()->getManager();
            $em->persist($modele);
            $em->flush();
            return $this->redirectToRoute('esprit_esprit_parc_afficher_Modele');
        }
        return $this->render('@EspritEspritParc/Modele/ajouterModele.html.twig',array());
    }

    public function modifierModeleAction(Request $request, $id)
    {
        $em =$this->getDoctrine()->getManager();
        $modele=$em->getRepository(Modele::class)->find($id);
        $Form=$this->createForm(ModeleForm::class,$modele);
        $Form->handleRequest($request);
        if ($Form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($modele);
            $em->flush();
            return $this->redirectToRoute('esprit_esprit_parc_afficher_Modele');
        }
        return $this->render('@EspritEspritParc/Modele/modifierModele.html.twig',array('form'=>$Form->createView()));
    }

    public function supprimerModeleAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $modele=$em->getRepository(Modele::class)->find($id);
        $em->remove($modele);
        $em->flush();
        return $this->redirectToRoute('esprit_esprit_parc_afficher_Modele');
    }

   public function chercherModeleAction(Request $request)
   {
        $em=$this->getDoctrine()->getManager();
        $modele=$em->getRepository(Modele::class)->findAll();
        if ($request->isMethod('POST'))
        {
            $pays = $request->get('pays');
            $modele = $em->getRepository(Modele::class)->findBy(array('pays'=>$pays));
        }
        return $this->render('@EspritEspritParc/Modele/chercherModele.html.twig',array('modeles'=>$modele));
    }

    public function queryBuilderAction()
    {
        $em=$this->getDoctrine()->getManager();
        $modeles=$em->getRepository(Modele::class )->findPaysQB();
        return $this->render('@EspritEspritParc/Modele/AfficheQB.html.twig',array('modeles'=>$modeles));
    }

    public function findPaysDQLAction()
    {
        $em=$this->getDoctrine()->getManager();
        $modeles=$em->getRepository(Modele::class )->findPaysDQL();
        return $this->render('@EspritEspritParc/Modele/AfficheDQL.html.twig',array('modeles'=>$modeles));
    }

    public function findPaysParameterAction($pays)
    {
        $em=$this->getDoctrine()->getManager();
        $modeles=$em->getRepository(Modele::class)->findPaysParameterDQL($pays);
        return $this->render('@EspritEspritParc/Modele/AfficheDQL.html.twig',array('modeles'=>$modeles));
    }
}