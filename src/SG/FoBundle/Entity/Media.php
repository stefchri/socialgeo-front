<?php

namespace SG\FoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Media
 *
 * @ORM\Table(name="media")
 * @ORM\Entity
 */
class Media
{
    /**
     * @var integer
     *
     * @ORM\Column(name="media_id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $mediaId;

    /**
     * @var string
     *
     * @ORM\Column(name="media_title", type="string", length=255, nullable=false)
     */
    private $mediaTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="media_description", type="text", nullable=true)
     */
    private $mediaDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="media_mimetype", type="string", length=128, nullable=true)
     */
    private $mediaMimetype;

    /**
     * @var string
     *
     * @ORM\Column(name="media_url", type="string", length=255, nullable=false)
     */
    private $mediaUrl;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="media_createddate", type="datetime", nullable=false)
     */
    private $mediaCreateddate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="media_modifieddate", type="datetime", nullable=true)
     */
    private $mediaModifieddate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="media_deleteddate", type="datetime", nullable=true)
     */
    private $mediaDeleteddate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="media_approveddate", type="datetime", nullable=true)
     */
    private $mediaApproveddate;

    /**
     * @var integer
     *
     * @ORM\Column(name="media_plusvotes", type="integer", nullable=true)
     */
    private $mediaPlusvotes;

    /**
     * @var integer
     *
     * @ORM\Column(name="media_minvotes", type="integer", nullable=true)
     */
    private $mediaMinvotes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Events", mappedBy="media")
     */
    private $event;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Addresses", inversedBy="media")
     * @ORM\JoinTable(name="media_has_addresses",
     *   joinColumns={
     *     @ORM\JoinColumn(name="media", referencedColumnName="media_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="address", referencedColumnName="address_id")
     *   }
     * )
     */
    private $address;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Categories", inversedBy="media")
     * @ORM\JoinTable(name="media_has_categories",
     *   joinColumns={
     *     @ORM\JoinColumn(name="media", referencedColumnName="media_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="category", referencedColumnName="category_id")
     *   }
     * )
     */
    private $category;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Comments", inversedBy="media")
     * @ORM\JoinTable(name="media_has_comments",
     *   joinColumns={
     *     @ORM\JoinColumn(name="media", referencedColumnName="media_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="comment", referencedColumnName="comment_id")
     *   }
     * )
     */
    private $comment;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Users", mappedBy="mediaFollowed")
     */
    private $userFollowing;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     * })
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->event = new \Doctrine\Common\Collections\ArrayCollection();
        $this->address = new \Doctrine\Common\Collections\ArrayCollection();
        $this->category = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comment = new \Doctrine\Common\Collections\ArrayCollection();
        $this->userFollowing = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Get mediaId
     *
     * @return integer 
     */
    public function getMediaId()
    {
        return $this->mediaId;
    }

    /**
     * Set mediaTitle
     *
     * @param string $mediaTitle
     * @return Media
     */
    public function setMediaTitle($mediaTitle)
    {
        $this->mediaTitle = $mediaTitle;
    
        return $this;
    }

    /**
     * Get mediaTitle
     *
     * @return string 
     */
    public function getMediaTitle()
    {
        return $this->mediaTitle;
    }

    /**
     * Set mediaDescription
     *
     * @param string $mediaDescription
     * @return Media
     */
    public function setMediaDescription($mediaDescription)
    {
        $this->mediaDescription = $mediaDescription;
    
        return $this;
    }

    /**
     * Get mediaDescription
     *
     * @return string 
     */
    public function getMediaDescription()
    {
        return $this->mediaDescription;
    }

    /**
     * Set mediaMimetype
     *
     * @param string $mediaMimetype
     * @return Media
     */
    public function setMediaMimetype($mediaMimetype)
    {
        $this->mediaMimetype = $mediaMimetype;
    
        return $this;
    }

    /**
     * Get mediaMimetype
     *
     * @return string 
     */
    public function getMediaMimetype()
    {
        return $this->mediaMimetype;
    }

    /**
     * Set mediaUrl
     *
     * @param string $mediaUrl
     * @return Media
     */
    public function setMediaUrl($mediaUrl)
    {
        $this->mediaUrl = $mediaUrl;
    
        return $this;
    }

    /**
     * Get mediaUrl
     *
     * @return string 
     */
    public function getMediaUrl()
    {
        return $this->mediaUrl;
    }

    /**
     * Set mediaCreateddate
     *
     * @param \DateTime $mediaCreateddate
     * @return Media
     */
    public function setMediaCreateddate($mediaCreateddate)
    {
        $this->mediaCreateddate = $mediaCreateddate;
    
        return $this;
    }

    /**
     * Get mediaCreateddate
     *
     * @return \DateTime 
     */
    public function getMediaCreateddate()
    {
        return $this->mediaCreateddate;
    }

    /**
     * Set mediaModifieddate
     *
     * @param \DateTime $mediaModifieddate
     * @return Media
     */
    public function setMediaModifieddate($mediaModifieddate)
    {
        $this->mediaModifieddate = $mediaModifieddate;
    
        return $this;
    }

    /**
     * Get mediaModifieddate
     *
     * @return \DateTime 
     */
    public function getMediaModifieddate()
    {
        return $this->mediaModifieddate;
    }

    /**
     * Set mediaDeleteddate
     *
     * @param \DateTime $mediaDeleteddate
     * @return Media
     */
    public function setMediaDeleteddate($mediaDeleteddate)
    {
        $this->mediaDeleteddate = $mediaDeleteddate;
    
        return $this;
    }

    /**
     * Get mediaDeleteddate
     *
     * @return \DateTime 
     */
    public function getMediaDeleteddate()
    {
        return $this->mediaDeleteddate;
    }

    /**
     * Set mediaApproveddate
     *
     * @param \DateTime $mediaApproveddate
     * @return Media
     */
    public function setMediaApproveddate($mediaApproveddate)
    {
        $this->mediaApproveddate = $mediaApproveddate;
    
        return $this;
    }

    /**
     * Get mediaApproveddate
     *
     * @return \DateTime 
     */
    public function getMediaApproveddate()
    {
        return $this->mediaApproveddate;
    }

    /**
     * Set mediaPlusvotes
     *
     * @param integer $mediaPlusvotes
     * @return Media
     */
    public function setMediaPlusvotes($mediaPlusvotes)
    {
        $this->mediaPlusvotes = $mediaPlusvotes;
    
        return $this;
    }

    /**
     * Get mediaPlusvotes
     *
     * @return integer 
     */
    public function getMediaPlusvotes()
    {
        return $this->mediaPlusvotes;
    }

    /**
     * Set mediaMinvotes
     *
     * @param integer $mediaMinvotes
     * @return Media
     */
    public function setMediaMinvotes($mediaMinvotes)
    {
        $this->mediaMinvotes = $mediaMinvotes;
    
        return $this;
    }

    /**
     * Get mediaMinvotes
     *
     * @return integer 
     */
    public function getMediaMinvotes()
    {
        return $this->mediaMinvotes;
    }

    /**
     * Add event
     *
     * @param \SG\FoBundle\Entity\Events $event
     * @return Media
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
     * Add address
     *
     * @param \SG\FoBundle\Entity\Addresses $address
     * @return Media
     */
    public function addAddres(\SG\FoBundle\Entity\Addresses $address)
    {
        $this->address[] = $address;
    
        return $this;
    }

    /**
     * Remove address
     *
     * @param \SG\FoBundle\Entity\Addresses $address
     */
    public function removeAddres(\SG\FoBundle\Entity\Addresses $address)
    {
        $this->address->removeElement($address);
    }

    /**
     * Get address
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Add category
     *
     * @param \SG\FoBundle\Entity\Categories $category
     * @return Media
     */
    public function addCategory(\SG\FoBundle\Entity\Categories $category)
    {
        $this->category[] = $category;
    
        return $this;
    }

    /**
     * Remove category
     *
     * @param \SG\FoBundle\Entity\Categories $category
     */
    public function removeCategory(\SG\FoBundle\Entity\Categories $category)
    {
        $this->category->removeElement($category);
    }

    /**
     * Get category
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add comment
     *
     * @param \SG\FoBundle\Entity\Comments $comment
     * @return Media
     */
    public function addComment(\SG\FoBundle\Entity\Comments $comment)
    {
        $this->comment[] = $comment;
    
        return $this;
    }

    /**
     * Remove comment
     *
     * @param \SG\FoBundle\Entity\Comments $comment
     */
    public function removeComment(\SG\FoBundle\Entity\Comments $comment)
    {
        $this->comment->removeElement($comment);
    }

    /**
     * Get comment
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Add userFollowing
     *
     * @param \SG\FoBundle\Entity\Users $userFollowing
     * @return Media
     */
    public function addUserFollowing(\SG\FoBundle\Entity\Users $userFollowing)
    {
        $this->userFollowing[] = $userFollowing;
    
        return $this;
    }

    /**
     * Remove userFollowing
     *
     * @param \SG\FoBundle\Entity\Users $userFollowing
     */
    public function removeUserFollowing(\SG\FoBundle\Entity\Users $userFollowing)
    {
        $this->userFollowing->removeElement($userFollowing);
    }

    /**
     * Get userFollowing
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserFollowing()
    {
        return $this->userFollowing;
    }

    /**
     * Set user
     *
     * @param \SG\FoBundle\Entity\Users $user
     * @return Media
     */
    public function setUser(\SG\FoBundle\Entity\Users $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \SG\FoBundle\Entity\Users 
     */
    public function getUser()
    {
        return $this->user;
    }
}