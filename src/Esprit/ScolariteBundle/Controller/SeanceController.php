<?php

namespace Esprit\ScolariteBundle\Controller;

use Esprit\ScolariteBundle\Entity\Prof;
use Esprit\ScolariteBundle\Entity\Seance;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Seance controller.
 *
 * @Route("seance")
 */
class SeanceController extends Controller
{

    private $emploiProf;

    /**
     * Lists all seance entities.
     *
     * @Route("/", name="seance_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $seances = $em->getRepository('EspritScolariteBundle:Seance')->findAll();
        $prof = $this->getDoctrine()->getRepository(Prof::class)->findAll();

        return $this->render('seance/index.html.twig', array(
            'seances' => $seances,
            'profs' => $prof,
            'emploiProf' => null,
        ));
    }

    /**
     * Lists all seance entities.
     *
     * @Route("/afficherEmploi/", name="afficher_emploi")
     * @Method("POST")
     */
    public function afficherEmploi(Request $request)
    {
//        $idProf = $request->request('prof');
//        dump($idProf);
//
//        $em = $this->getDoctrine()->getManager();
//        $prof = $em->getRepository('EspritScolariteBundl:Prof')->findBy(array('prof' => $idProf));
//
//        $seances = $prof[0]->getSeances();
//        $profs = $this->getDoctrine()->getRepository(Prof::class)->findAll();
//
//        return $this->render('seance/index.html.twig', array(
//            'seances' => $seances,
//            'profs' => $profs,
//            'emploiProf' => null,
//        ));

//        $idProf = $request->request('prof');
//        dump($request->getParameter("prof"));

          $idProf = $request->request->get('prof');
          $em = $this->getDoctrine()->getManager();
          $prof = $em->getRepository('EspritScolariteBundle:Prof')->findBy(array('id' => $idProf));
          $seances = $prof[0]->getSeances();

//        $seances = $em->getRepository('EspritScolariteBundle:Seance')->findAll();
          $profs = $this->getDoctrine()->getRepository(Prof::class)->findAll();

        return $this->render('seance/index.html.twig', array(
            'seances' => $seances,
            'profs' => $profs,
            'emploiProf' => null,
        ));

    }

    public function testClasse($idClasse, $idJour, $idHoraire)
    {
        $seance = $this->getDoctrine()
            ->getRepository(Seance::class)
            ->findBy(array('classe' => $idClasse, 'jour' => $idJour, 'horaire' => $idHoraire));
        return $seance == null;
    }

    public function testProf($idProf, $idJour, $idHoraire)
    {
        $seance = $this->getDoctrine()
            ->getRepository(Seance::class)
            ->findBy(array('prof' => $idProf, 'jour' => $idJour, 'horaire' => $idHoraire));
        return $seance == null;
    }

    public function testSalle($idSalle, $idJour, $idHoraire)
    {
        $seance = $this->getDoctrine()
            ->getRepository(Seance::class)
            ->findBy(array('salle' => $idSalle, 'jour' => $idJour, 'horaire' => $idHoraire));
        return $seance == null;
    }



    /**
     * Creates a new seance entity.
     *
     * @Route("/new", name="seance_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $seance = new Seance();
        $form = $this->createForm('Esprit\ScolariteBundle\Form\SeanceType', $seance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $idClasse = $seance->getClasse();
            $idJour = $seance->getJour();
            $idHoraire = $seance->getHoraire();
            $idProf = $seance->getProf();
            $idSalle = $seance->getSalle();

            $seanceByClasse = $this->getDoctrine()
                ->getRepository(Seance::class)
                ->findBy(array('classe' => $idClasse, 'jour' => $idJour, 'horaire' => $idHoraire));
            $seanceByProf = $this->getDoctrine()
                ->getRepository(Seance::class)
                ->findBy(array('prof' => $idProf, 'jour' => $idJour, 'horaire' => $idHoraire));
            $seanceBySalle = $this->getDoctrine()
                ->getRepository(Seance::class)
                ->findBy(array('salle' => $idSalle, 'jour' => $idJour, 'horaire' => $idHoraire));

            if ($seanceByClasse == null
                && $seanceByProf == null
                && $seanceBySalle == null) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($seance);
                $em->flush();

                return $this->redirectToRoute('seance_show', array('id' => $seance->getId()));
            }


        }
        // print("ndcndjcnjdkcn");
        return $this->render('seance/new.html.twig', array(
            'seance' => $seance,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a seance entity.
     *
     * @Route("/{id}", name="seance_show")
     * @Method("GET")
     */
    public function showAction(Seance $seance)
    {
        $deleteForm = $this->createDeleteForm($seance);

        return $this->render('seance/show.html.twig', array(
            'seance' => $seance,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing seance entity.
     *
     * @Route("/{id}/edit", name="seance_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Seance $seance)
    {
        $deleteForm = $this->createDeleteForm($seance);
        $editForm = $this->createForm('Esprit\ScolariteBundle\Form\SeanceType', $seance);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('seance_edit', array('id' => $seance->getId()));
        }

        return $this->render('seance/edit.html.twig', array(
            'seance' => $seance,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a seance entity.
     *
     * @Route("/DELETE/{id}", name="seance_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, Seance $seance)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($seance);
        $em->flush();
        return $this->redirectToRoute('seance_index');
    }

    /**
     * Creates a form to delete a seance entity.
     *
     * @param Seance $seance The seance entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Seance $seance)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('seance_delete', array('id' => $seance->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * Deletes a seance entity.
     *
     * @Route("/mail", name="mail")
     * @Method("POST")
     */
    public function mailAction( Request $request ){

        try{
            //dump($idProf);
            /* $transport = (new Swift_SmtpTransport('smtp.example.org', 25))
                 ->setUsername('your username')
                 ->setPassword('your password')
             ;
             $mailer = new Swift_Mailer($transport);*/
 $mailer =new Swift_Mailer();
            $idProf = $request->request->get('dProf');
            $em = $this->getDoctrine()->getManager();
            $prof = $em->getRepository('EspritScolariteBundle:Prof')->findBy(array('id' => $idProf));
            $seances = $prof[0]->getSeances();
            $message = (new \Swift_Message('Hello Email'))
                ->setFrom('send@example.com')
                ->setTo('recipient@example.com')
                ->setBody(
                    $this->renderView(
                    // app/Resources/views/Emails/registration.html.twig
                        'Emails/registration.html.twig',
                        ['seances' => $seances]
                    ),
                    'text/html'
                )


            ;

            $mailer->send($message);

        }catch(\Exception $e){
}


        // or, you can also fetch the mailer service this way
        // $this->get('mailer')->send($message);
        $datas = json_encode(["data" => "ok"]); // formater le résultat de la requête en json
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent($datas);

        return $response;
    }

}
