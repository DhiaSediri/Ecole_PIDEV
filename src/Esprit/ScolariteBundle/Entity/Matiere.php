<?php
/**
 * Created by PhpStorm.
 * User: Dhia
 * Date: 18/03/2020
 * Time: 18:33
 */

namespace Esprit\ScolariteBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Matiere
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string" ,length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $coefficient;

    /**
     * @ORM\OneToMany(targetEntity="Seance",mappedBy="matiere",cascade={"remove"})
     */
    private $seances;

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
    public function getCoefficient()
    {
        return $this->coefficient;
    }

    /**
     * @param mixed $coefficient
     */
    public function setCoefficient($coefficient)
    {
        $this->coefficient = $coefficient;
    }

    /**
     * @return mixed
     */
    public function getSeances()
    {
        return $this->seances;
    }

    /**
     * @param mixed $seances
     */
    public function setSeances($seances)
    {
        $this->seances = $seances;
    }

}