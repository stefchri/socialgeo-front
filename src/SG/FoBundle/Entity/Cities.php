<?php

namespace SG\FoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cities
 *
 * @ORM\Table(name="cities")
 * @ORM\Entity
 */
class Cities
{
    /**
     * @var integer
     *
     * @ORM\Column(name="city_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cityId;

    /**
     * @var string
     *
     * @ORM\Column(name="city_name", type="string", length=128, nullable=false)
     */
    private $cityName;

    /**
     * @var string
     *
     * @ORM\Column(name="city_description", type="text", nullable=true)
     */
    private $cityDescription;

    /**
     * @var integer
     *
     * @ORM\Column(name="city_postcode", type="integer", nullable=false)
     */
    private $cityPostcode;

    /**
     * @var \Countries
     *
     * @ORM\ManyToOne(targetEntity="Countries")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country_id", referencedColumnName="country_id")
     * })
     */
    private $country;



    /**
     * Get cityId
     *
     * @return integer 
     */
    public function getCityId()
    {
        return $this->cityId;
    }

    /**
     * Set cityName
     *
     * @param string $cityName
     * @return Cities
     */
    public function setCityName($cityName)
    {
        $this->cityName = $cityName;
    
        return $this;
    }

    /**
     * Get cityName
     *
     * @return string 
     */
    public function getCityName()
    {
        return $this->cityName;
    }

    /**
     * Set cityDescription
     *
     * @param string $cityDescription
     * @return Cities
     */
    public function setCityDescription($cityDescription)
    {
        $this->cityDescription = $cityDescription;
    
        return $this;
    }

    /**
     * Get cityDescription
     *
     * @return string 
     */
    public function getCityDescription()
    {
        return $this->cityDescription;
    }

    /**
     * Set cityPostcode
     *
     * @param integer $cityPostcode
     * @return Cities
     */
    public function setCityPostcode($cityPostcode)
    {
        $this->cityPostcode = $cityPostcode;
    
        return $this;
    }

    /**
     * Get cityPostcode
     *
     * @return integer 
     */
    public function getCityPostcode()
    {
        return $this->cityPostcode;
    }

    /**
     * Set country
     *
     * @param \SG\FoBundle\Entity\Countries $country
     * @return Cities
     */
    public function setCountry(\SG\FoBundle\Entity\Countries $country = null)
    {
        $this->country = $country;
    
        return $this;
    }

    /**
     * Get country
     *
     * @return \SG\FoBundle\Entity\Countries 
     */
    public function getCountry()
    {
        return $this->country;
    }
}