<?php

namespace SG\FoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Events
 *
 * @ORM\Table(name="events")
 * @ORM\Entity
 */
class Events
{
    /**
     * @var integer
     *
     * @ORM\Column(name="event_id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $eventId;

    /**
     * @var string
     *
     * @ORM\Column(name="event_name", type="string", length=255, nullable=false)
     */
    private $eventName;

    /**
     * @var string
     *
     * @ORM\Column(name="event_description", type="text", nullable=true)
     */
    private $eventDescription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="event_startdate", type="datetime", nullable=false)
     */
    private $eventStartdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="event_enddate", type="datetime", nullable=false)
     */
    private $eventEnddate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="event_createddate", type="datetime", nullable=false)
     */
    private $eventCreateddate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="event_modifieddate", type="datetime", nullable=true)
     */
    private $eventModifieddate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="event_deleteddate", type="datetime", nullable=true)
     */
    private $eventDeleteddate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="event_approveddate", type="datetime", nullable=true)
     */
    private $eventApproveddate;

    /**
     * @var integer
     *
     * @ORM\Column(name="event_plusvotes", type="integer", nullable=true)
     */
    private $eventPlusvotes;

    /**
     * @var integer
     *
     * @ORM\Column(name="event_minvotes", type="integer", nullable=true)
     */
    private $eventMinvotes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Addresses", inversedBy="event")
     * @ORM\JoinTable(name="events_has_addresses",
     *   joinColumns={
     *     @ORM\JoinColumn(name="event", referencedColumnName="event_id")
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
     * @ORM\ManyToMany(targetEntity="Categories", inversedBy="event")
     * @ORM\JoinTable(name="events_has_categories",
     *   joinColumns={
     *     @ORM\JoinColumn(name="event", referencedColumnName="event_id")
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
     * @ORM\ManyToMany(targetEntity="Comments", inversedBy="event")
     * @ORM\JoinTable(name="events_has_comments",
     *   joinColumns={
     *     @ORM\JoinColumn(name="event", referencedColumnName="event_id")
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
     * @ORM\ManyToMany(targetEntity="Media", inversedBy="event")
     * @ORM\JoinTable(name="events_has_media",
     *   joinColumns={
     *     @ORM\JoinColumn(name="event", referencedColumnName="event_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="media", referencedColumnName="media_id")
     *   }
     * )
     */
    private $media;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Users", mappedBy="eventFollowed")
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
        $this->address = new \Doctrine\Common\Collections\ArrayCollection();
        $this->category = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comment = new \Doctrine\Common\Collections\ArrayCollection();
        $this->media = new \Doctrine\Common\Collections\ArrayCollection();
        $this->userFollowing = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Get eventId
     *
     * @return integer 
     */
    public function getEventId()
    {
        return $this->eventId;
    }

    /**
     * Set eventName
     *
     * @param string $eventName
     * @return Events
     */
    public function setEventName($eventName)
    {
        $this->eventName = $eventName;
    
        return $this;
    }

    /**
     * Get eventName
     *
     * @return string 
     */
    public function getEventName()
    {
        return $this->eventName;
    }

    /**
     * Set eventDescription
     *
     * @param string $eventDescription
     * @return Events
     */
    public function setEventDescription($eventDescription)
    {
        $this->eventDescription = $eventDescription;
    
        return $this;
    }

    /**
     * Get eventDescription
     *
     * @return string 
     */
    public function getEventDescription()
    {
        return $this->eventDescription;
    }

    /**
     * Set eventStartdate
     *
     * @param \DateTime $eventStartdate
     * @return Events
     */
    public function setEventStartdate($eventStartdate)
    {
        $this->eventStartdate = $eventStartdate;
    
        return $this;
    }

    /**
     * Get eventStartdate
     *
     * @return \DateTime 
     */
    public function getEventStartdate()
    {
        return $this->eventStartdate;
    }

    /**
     * Set eventEnddate
     *
     * @param \DateTime $eventEnddate
     * @return Events
     */
    public function setEventEnddate($eventEnddate)
    {
        $this->eventEnddate = $eventEnddate;
    
        return $this;
    }

    /**
     * Get eventEnddate
     *
     * @return \DateTime 
     */
    public function getEventEnddate()
    {
        return $this->eventEnddate;
    }

    /**
     * Set eventCreateddate
     *
     * @param \DateTime $eventCreateddate
     * @return Events
     */
    public function setEventCreateddate($eventCreateddate)
    {
        $this->eventCreateddate = $eventCreateddate;
    
        return $this;
    }

    /**
     * Get eventCreateddate
     *
     * @return \DateTime 
     */
    public function getEventCreateddate()
    {
        return $this->eventCreateddate;
    }

    /**
     * Set eventModifieddate
     *
     * @param \DateTime $eventModifieddate
     * @return Events
     */
    public function setEventModifieddate($eventModifieddate)
    {
        $this->eventModifieddate = $eventModifieddate;
    
        return $this;
    }

    /**
     * Get eventModifieddate
     *
     * @return \DateTime 
     */
    public function getEventModifieddate()
    {
        return $this->eventModifieddate;
    }

    /**
     * Set eventDeleteddate
     *
     * @param \DateTime $eventDeleteddate
     * @return Events
     */
    public function setEventDeleteddate($eventDeleteddate)
    {
        $this->eventDeleteddate = $eventDeleteddate;
    
        return $this;
    }

    /**
     * Get eventDeleteddate
     *
     * @return \DateTime 
     */
    public function getEventDeleteddate()
    {
        return $this->eventDeleteddate;
    }

    /**
     * Set eventApproveddate
     *
     * @param \DateTime $eventApproveddate
     * @return Events
     */
    public function setEventApproveddate($eventApproveddate)
    {
        $this->eventApproveddate = $eventApproveddate;
    
        return $this;
    }

    /**
     * Get eventApproveddate
     *
     * @return \DateTime 
     */
    public function getEventApproveddate()
    {
        return $this->eventApproveddate;
    }

    /**
     * Set eventPlusvotes
     *
     * @param integer $eventPlusvotes
     * @return Events
     */
    public function setEventPlusvotes($eventPlusvotes)
    {
        $this->eventPlusvotes = $eventPlusvotes;
    
        return $this;
    }

    /**
     * Get eventPlusvotes
     *
     * @return integer 
     */
    public function getEventPlusvotes()
    {
        return $this->eventPlusvotes;
    }

    /**
     * Set eventMinvotes
     *
     * @param integer $eventMinvotes
     * @return Events
     */
    public function setEventMinvotes($eventMinvotes)
    {
        $this->eventMinvotes = $eventMinvotes;
    
        return $this;
    }

    /**
     * Get eventMinvotes
     *
     * @return integer 
     */
    public function getEventMinvotes()
    {
        return $this->eventMinvotes;
    }

    /**
     * Add address
     *
     * @param \SG\FoBundle\Entity\Addresses $address
     * @return Events
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
     * @return Events
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
     * @return Events
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
     * Add media
     *
     * @param \SG\FoBundle\Entity\Media $media
     * @return Events
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
     * Add userFollowing
     *
     * @param \SG\FoBundle\Entity\Users $userFollowing
     * @return Events
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
     * @return Events
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