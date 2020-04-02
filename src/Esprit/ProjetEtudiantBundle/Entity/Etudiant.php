<?php
/**
 * Created by PhpStorm.
 * User: Dhia
 * Date: 17/01/2019
 * Time: 14:55
 */

namespace Esprit\ProjetEtudiantBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Etudiant
{
    /**
     *@ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $matricule;

    /**
     * @ORM\Column(type="string" ,length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string" ,length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string" ,length=255)
     */
    private $niveau;

    /**
     * @ORM\Column(type="string" ,length=255)
     */
    private $numClasse;

    /**
     * @ORM\ManyToOne(targetEntity="Projet")
     * @ORM\JoinColumn(name="id_projet",referencedColumnName="id")
     */
    private $modele;

    /**
     * @return mixed
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * @param mixed $matricule
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * @param mixed $niveau
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
    }

    /**
     * @return mixed
     */
    public function getNumClasse()
    {
        return $this->numClasse;
    }

    /**
     * @param mixed $numClasse
     */
    public function setNumClasse($numClasse)
    {
        $this->numClasse = $numClasse;
    }

    /**
     * @return mixed
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * @param mixed $modele
     */
    public function setModele($modele)
    {
        $this->modele = $modele;
    }

}