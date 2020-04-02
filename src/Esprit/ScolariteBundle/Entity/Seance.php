<?php
/**
 * Created by PhpStorm.
 * User: Dhia
 * Date: 18/03/2020
 * Time: 18:55
 */

namespace Esprit\ScolariteBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity()
 */
class Seance
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Classe")
     * @ORM\JoinColumn(name="id_classe", referencedColumnName="id")
     */
    private $classe;

    /**
     * @ORM\ManyToOne(targetEntity="Matiere")
     * @ORM\JoinColumn(name="id_matiere", referencedColumnName="id")
     */
    private $matiere;


    /**
     * @ORM\ManyToOne(targetEntity="Salle")
     * @ORM\JoinColumn(name="id_salle", referencedColumnName="id")
     */
    private $salle;


    /**
     * @ORM\ManyToOne(targetEntity="Prof")
     * @ORM\JoinColumn(name="id_prof", referencedColumnName="id")
     */
    private $prof;


    /**
     * @ORM\ManyToOne(targetEntity="Horaire")
     * @ORM\JoinColumn(name="id_horaire", referencedColumnName="id")
     */
    private $horaire;


    /**
     * @ORM\ManyToOne(targetEntity="Jour")
     * @ORM\JoinColumn(name="id_jour", referencedColumnName="id")
     */
    private $jour;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * @param mixed $classe
     */
    public function setClasse($classe)
    {
        $this->classe = $classe;
    }

    /**
     * @return mixed
     */
    public function getMatiere()
    {
        return $this->matiere;
    }

    /**
     * @param mixed $matiere
     */
    public function setMatiere($matiere)
    {
        $this->matiere = $matiere;
    }

    /**
     * @return mixed
     */
    public function getSalle()
    {
        return $this->salle;
    }

    /**
     * @param mixed $salle
     */
    public function setSalle($salle)
    {
        $this->salle = $salle;
    }

    /**
     * @return mixed
     */
    public function getProf()
    {
        return $this->prof;
    }

    /**
     * @param mixed $prof
     */
    public function setProf($prof)
    {
        $this->prof = $prof;
    }

    /**
     * @return mixed
     */
    public function getHoraire()
    {
        return $this->horaire;
    }

    /**
     * @param mixed $horaire
     */
    public function setHoraire($horaire)
    {
        $this->horaire = $horaire;
    }

    /**
     * @return mixed
     */
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * @param mixed $jour
     */
    public function setJour($jour)
    {
        $this->jour = $jour;
    }

}