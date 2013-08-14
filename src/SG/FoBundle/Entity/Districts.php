<?php

namespace SG\FoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Districts
 *
 * @ORM\Table(name="districts")
 * @ORM\Entity
 */
class Districts
{
    /**
     * @var integer
     *
     * @ORM\Column(name="district_id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $districtId;

    /**
     * @var string
     *
     * @ORM\Column(name="district_name", type="string", length=255, nullable=false)
     */
    private $districtName;

    /**
     * @var string
     *
     * @ORM\Column(name="district_description", type="text", nullable=true)
     */
    private $districtDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="district_imageurl", type="string", length=128, nullable=true)
     */
    private $districtImageurl;

    /**
     * @var string
     *
     * @ORM\Column(name="district_locationlink", type="string", length=128, nullable=true)
     */
    private $districtLocationlink;

    /**
     * @var \Cities
     *
     * @ORM\ManyToOne(targetEntity="Cities")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="city_id", referencedColumnName="city_id")
     * })
     */
    private $city;



    /**
     * Get districtId
     *
     * @return integer 
     */
    public function getDistrictId()
    {
        return $this->districtId;
    }

    /**
     * Set districtName
     *
     * @param string $districtName
     * @return Districts
     */
    public function setDistrictName($districtName)
    {
        $this->districtName = $districtName;
    
        return $this;
    }

    /**
     * Get districtName
     *
     * @return string 
     */
    public function getDistrictName()
    {
        return $this->districtName;
    }

    /**
     * Set districtDescription
     *
     * @param string $districtDescription
     * @return Districts
     */
    public function setDistrictDescription($districtDescription)
    {
        $this->districtDescription = $districtDescription;
    
        return $this;
    }

    /**
     * Get districtDescription
     *
     * @return string 
     */
    public function getDistrictDescription()
    {
        return $this->districtDescription;
    }

    /**
     * Set districtImageurl
     *
     * @param string $districtImageurl
     * @return Districts
     */
    public function setDistrictImageurl($districtImageurl)
    {
        $this->districtImageurl = $districtImageurl;
    
        return $this;
    }

    /**
     * Get districtImageurl
     *
     * @return string 
     */
    public function getDistrictImageurl()
    {
        return $this->districtImageurl;
    }

    /**
     * Set districtLocationlink
     *
     * @param string $districtLocationlink
     * @return Districts
     */
    public function setDistrictLocationlink($districtLocationlink)
    {
        $this->districtLocationlink = $districtLocationlink;
    
        return $this;
    }

    /**
     * Get districtLocationlink
     *
     * @return string 
     */
    public function getDistrictLocationlink()
    {
        return $this->districtLocationlink;
    }

    /**
     * Set city
     *
     * @param \SG\FoBundle\Entity\Cities $city
     * @return Districts
     */
    public function setCity(\SG\FoBundle\Entity\Cities $city = null)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return \SG\FoBundle\Entity\Cities 
     */
    public function getCity()
    {
        return $this->city;
    }
}