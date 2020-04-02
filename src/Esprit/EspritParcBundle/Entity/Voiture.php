<?php
/**
 * Created by PhpStorm.
 * User: Dhia
 * Date: 30/10/2018
 * Time: 19:20
 */

namespace Esprit\EspritParcBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Esprit\EspritParcBundle\Repository\VoitureRepository")
 */
class Voiture
{
    /**
    *@ORM\GeneratedValue
    * @ORM\Id
    * @ORM\Column(type="integer")
    */
    private $ref;

    /**
     * @ORM\Column(type="string" ,length=255)
     */
    private $serie;

    /**
     * @ORM\Column(type="date" )
     */
    private $DateMiseCirculation;

    /**
     * @ORM\ManyToOne(targetEntity="Modele")
     * @ORM\JoinColumn(name="id_modele",referencedColumnName="id")
     */
    private $modele;

    /**
     * @return mixed
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param mixed $ref
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
    }

    /**
     * @return mixed
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * @param mixed $serie
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
    }

    /**
     * @return mixed
     */
    public function getDateMiseCirculation()
    {
        return $this->DateMiseCirculation;
    }

    /**
     * @param mixed $DateMiseCirculation
     */
    public function setDateMiseCirculation($DateMiseCirculation)
    {
        $this->DateMiseCirculation = $DateMiseCirculation;
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