<?php
/**
 * Created by PhpStorm.
 * User: Dhia
 * Date: 18/01/2019
 * Time: 11:22
 */

namespace Esprit\ReservationBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateArrive;

    /**
     * @ORM\Column(type="string" ,length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbchambres;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbpersonnes;

    /**
     * @ORM\ManyToOne(targetEntity="Hotel")
     * @ORM\JoinColumn(name="id_hotel",referencedColumnName="id")
     */
    private $hotel;

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
    public function getDateArrive()
    {
        return $this->dateArrive;
    }

    /**
     * @param mixed $dateArrive
     */
    public function setDateArrive($dateArrive)
    {
        $this->dateArrive = $dateArrive;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getNbchambres()
    {
        return $this->nbchambres;
    }

    /**
     * @param mixed $nbchambres
     */
    public function setNbchambres($nbchambres)
    {
        $this->nbchambres = $nbchambres;
    }

    /**
     * @return mixed
     */
    public function getNbpersonnes()
    {
        return $this->nbpersonnes;
    }

    /**
     * @param mixed $nbpersonnes
     */
    public function setNbpersonnes($nbpersonnes)
    {
        $this->nbpersonnes = $nbpersonnes;
    }

    /**
     * @return mixed
     */
    public function getHotel()
    {
        return $this->hotel;
    }

    /**
     * @param mixed $hotel
     */
    public function setHotel($hotel)
    {
        $this->hotel = $hotel;
    }

}