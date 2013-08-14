<?php

namespace SG\FoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Addresses
 *
 * @ORM\Table(name="addresses")
 * @ORM\Entity
 */
class Addresses
{
    /**
     * @var integer
     *
     * @ORM\Column(name="address_id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $addressId;

    /**
     * @var string
     *
     * @ORM\Column(name="address_street", type="string", length=255, nullable=false)
     */
    private $addressStreet;

    /**
     * @var integer
     *
     * @ORM\Column(name="address_housenumber", type="integer", nullable=false)
     */
    private $addressHousenumber;

    /**
     * @var float
     *
     * @ORM\Column(name="address_lat", type="decimal", nullable=false)
     */
    private $addressLat;

    /**
     * @var float
     *
     * @ORM\Column(name="address_lng", type="decimal", nullable=false)
     */
    private $addressLng;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Events", mappedBy="address")
     */
    private $event;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Media", mappedBy="address")
     */
    private $media;

    /**
     * @var \Districts
     *
     * @ORM\ManyToOne(targetEntity="Districts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="district_id", referencedColumnName="district_id")
     * })
     */
    private $district;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->event = new \Doctrine\Common\Collections\ArrayCollection();
        $this->media = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Get addressId
     *
     * @return integer 
     */
    public function getAddressId()
    {
        return $this->addressId;
    }

    /**
     * Set addressStreet
     *
     * @param string $addressStreet
     * @return Addresses
     */
    public function setAddressStreet($addressStreet)
    {
        $this->addressStreet = $addressStreet;
    
        return $this;
    }

    /**
     * Get addressStreet
     *
     * @return string 
     */
    public function getAddressStreet()
    {
        return $this->addressStreet;
    }

    /**
     * Set addressHousenumber
     *
     * @param integer $addressHousenumber
     * @return Addresses
     */
    public function setAddressHousenumber($addressHousenumber)
    {
        $this->addressHousenumber = $addressHousenumber;
    
        return $this;
    }

    /**
     * Get addressHousenumber
     *
     * @return integer 
     */
    public function getAddressHousenumber()
    {
        return $this->addressHousenumber;
    }

    /**
     * Set addressLat
     *
     * @param float $addressLat
     * @return Addresses
     */
    public function setAddressLat($addressLat)
    {
        $this->addressLat = $addressLat;
    
        return $this;
    }

    /**
     * Get addressLat
     *
     * @return float 
     */
    public function getAddressLat()
    {
        return $this->addressLat;
    }

    /**
     * Set addressLng
     *
     * @param float $addressLng
     * @return Addresses
     */
    public function setAddressLng($addressLng)
    {
        $this->addressLng = $addressLng;
    
        return $this;
    }

    /**
     * Get addressLng
     *
     * @return float 
     */
    public function getAddressLng()
    {
        return $this->addressLng;
    }

    /**
     * Add event
     *
     * @param \SG\FoBundle\Entity\Events $event
     * @return Addresses
     */
    public function addEvent(\SG\FoBundle\Entity\Events $event)
    {
        $this->event[] = $event;
    
        return $this;
    }

    /**
     * Remove event
     *
     * @param \SG\FoBundle\Entity\Events $event
     */
    public function removeEvent(\SG\FoBundle\Entity\Events $event)
    {
        $this->event->removeElement($event);
    }

    /**
     * Get event
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Add media
     *
     * @param \SG\FoBundle\Entity\Media $media
     * @return Addresses
     */
    public function addMedia(\SG\FoBundle\Entity\Media $media)
    {
        $this->media[] = $media;
    
        return $this;
    }

    /**
     * Remove media
     *
     * @param \SG\FoBundle\Entity\Media $media
     */
    public function removeMedia(\SG\FoBundle\Entity\Media $media)
    {
        $this->media->removeElement($media);
    }

    /**
     * Get media
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set district
     *
     * @param \SG\FoBundle\Entity\Districts $district
     * @return Addresses
     */
    public function setDistrict(\SG\FoBundle\Entity\Districts $district = null)
    {
        $this->district = $district;
    
        return $this;
    }

    /**
     * Get district
     *
     * @return \SG\FoBundle\Entity\Districts 
     */
    public function getDistrict()
    {
        return $this->district;
    }
}