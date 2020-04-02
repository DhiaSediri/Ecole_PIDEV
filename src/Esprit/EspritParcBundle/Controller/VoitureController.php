<?php
/**
 * Created by PhpStorm.
 * User: Dhia
 * Date: 02/10/2018
 * Time: 20:16
 */

namespace Esprit\EspritParcBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class VoitureController extends Controller
{
    public function affichageAction($marque)
    {
        return $this->render('@EspritEspritParc/Voiture/affichage.html.twig',array('marque'=>$marque));
    }

    public function listAction()
    {
        $marques = array('BMW','Renault','Peugeot','Fiat');
        return $this->render('@EspritEspritParc/Voiture/list.html.twig',array('marques'=>$marques));
    }

    public function list2Action()
    {
        $marques =array('BMW','Renault','Peugeot','fiat');
        $voitures =array(
                        array('id'=>'1','serie'=>'123','marque'=>$marques[0]),
                        array('id'=>'2','serie'=>'456','marque'=>$marques[1]),
                        array('id'=>'3','serie'=>'789','marque'=>$marques[2]));
        return $this->render('@EspritEspritParc/Voiture/list.html.twig',array('marques'=>$marques,'voitures'=>$voitures));
    }

    public function detailAction(Request $request)
    {
        $id =$request->get('id');
        $serie =$request->get('serie');
        $marque =$request->get('marque');

        return $this->render('@EspritEspritParc/Voiture/affiche.html.twig', array(
            'id'=>$id,
            'serie'=>$serie,
            'marque'=>$marque));
    }
}