<?php

namespace SG\FoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity
 */
class Categories
{
    /**
     * @var integer
     *
     * @ORM\Column(name="category_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $categoryId;

    /**
     * @var string
     *
     * @ORM\Column(name="category_name", type="string", length=128, nullable=false)
     */
    private $categoryName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="category_approveddate", type="datetime", nullable=true)
     */
    private $categoryApproveddate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="category_deleteddate", type="datetime", nullable=true)
     */
    private $categoryDeleteddate;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Articles", mappedBy="category")
     */
    private $article;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Events", mappedBy="category")
     */
    private $event;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Media", mappedBy="category")
     */
    private $media;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->article = new \Doctrine\Common\Collections\ArrayCollection();
        $this->event = new \Doctrine\Common\Collections\ArrayCollection();
        $this->media = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Get categoryId
     *
     * @return integer 
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Set categoryName
     *
     * @param string $categoryName
     * @return Categories
     */
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;
    
        return $this;
    }

    /**
     * Get categoryName
     *
     * @return string 
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * Set categoryApproveddate
     *
     * @param \DateTime $categoryApproveddate
     * @return Categories
     */
    public function setCategoryApproveddate($categoryApproveddate)
    {
        $this->categoryApproveddate = $categoryApproveddate;
    
        return $this;
    }

    /**
     * Get categoryApproveddate
     *
     * @return \DateTime 
     */
    public function getCategoryApproveddate()
    {
        return $this->categoryApproveddate;
    }

    /**
     * Set categoryDeleteddate
     *
     * @param \DateTime $categoryDeleteddate
     * @return Categories
     */
    public function setCategoryDeleteddate($categoryDeleteddate)
    {
        $this->categoryDeleteddate = $categoryDeleteddate;
    
        return $this;
    }

    /**
     * Get categoryDeleteddate
     *
     * @return \DateTime 
     */
    public function getCategoryDeleteddate()
    {
        return $this->categoryDeleteddate;
    }

    /**
     * Add article
     *
     * @param \SG\FoBundle\Entity\Articles $article
     * @return Categories
     */
    public function addArticle(\SG\FoBundle\Entity\Articles $article)
    {
        $this->article[] = $article;
    
        return $this;
    }

    /**
     * Remove article
     *
     * @param \SG\FoBundle\Entity\Articles $article
     */
    public function removeArticle(\SG\FoBundle\Entity\Articles $article)
    {
        $this->article->removeElement($article);
    }

    /**
     * Get article
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Add event
     *
     * @param \SG\FoBundle\Entity\Events $event
     * @return Categories
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
     * @return Categories
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
}