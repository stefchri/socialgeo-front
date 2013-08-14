<?php

namespace SG\FoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comments
 *
 * @ORM\Table(name="comments")
 * @ORM\Entity
 */
class Comments
{
    /**
     * @var integer
     *
     * @ORM\Column(name="comment_id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $commentId;

    /**
     * @var string
     *
     * @ORM\Column(name="comment_body", type="text", nullable=false)
     */
    private $commentBody;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="comment_createddate", type="datetime", nullable=false)
     */
    private $commentCreateddate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="comment_modifieddate", type="datetime", nullable=true)
     */
    private $commentModifieddate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="comment_deleteddate", type="datetime", nullable=true)
     */
    private $commentDeleteddate;

    /**
     * @var integer
     *
     * @ORM\Column(name="comment_parentid", type="bigint", nullable=true)
     */
    private $commentParentid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Articles", mappedBy="comment")
     */
    private $article;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Events", mappedBy="comment")
     */
    private $event;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Media", mappedBy="comment")
     */
    private $media;

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
        $this->article = new \Doctrine\Common\Collections\ArrayCollection();
        $this->event = new \Doctrine\Common\Collections\ArrayCollection();
        $this->media = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Get commentId
     *
     * @return integer 
     */
    public function getCommentId()
    {
        return $this->commentId;
    }

    /**
     * Set commentBody
     *
     * @param string $commentBody
     * @return Comments
     */
    public function setCommentBody($commentBody)
    {
        $this->commentBody = $commentBody;
    
        return $this;
    }

    /**
     * Get commentBody
     *
     * @return string 
     */
    public function getCommentBody()
    {
        return $this->commentBody;
    }

    /**
     * Set commentCreateddate
     *
     * @param \DateTime $commentCreateddate
     * @return Comments
     */
    public function setCommentCreateddate($commentCreateddate)
    {
        $this->commentCreateddate = $commentCreateddate;
    
        return $this;
    }

    /**
     * Get commentCreateddate
     *
     * @return \DateTime 
     */
    public function getCommentCreateddate()
    {
        return $this->commentCreateddate;
    }

    /**
     * Set commentModifieddate
     *
     * @param \DateTime $commentModifieddate
     * @return Comments
     */
    public function setCommentModifieddate($commentModifieddate)
    {
        $this->commentModifieddate = $commentModifieddate;
    
        return $this;
    }

    /**
     * Get commentModifieddate
     *
     * @return \DateTime 
     */
    public function getCommentModifieddate()
    {
        return $this->commentModifieddate;
    }

    /**
     * Set commentDeleteddate
     *
     * @param \DateTime $commentDeleteddate
     * @return Comments
     */
    public function setCommentDeleteddate($commentDeleteddate)
    {
        $this->commentDeleteddate = $commentDeleteddate;
    
        return $this;
    }

    /**
     * Get commentDeleteddate
     *
     * @return \DateTime 
     */
    public function getCommentDeleteddate()
    {
        return $this->commentDeleteddate;
    }

    /**
     * Set commentParentid
     *
     * @param integer $commentParentid
     * @return Comments
     */
    public function setCommentParentid($commentParentid)
    {
        $this->commentParentid = $commentParentid;
    
        return $this;
    }

    /**
     * Get commentParentid
     *
     * @return integer 
     */
    public function getCommentParentid()
    {
        return $this->commentParentid;
    }

    /**
     * Add article
     *
     * @param \SG\FoBundle\Entity\Articles $article
     * @return Comments
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
     * @return Comments
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
     * @return Comments
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
     * Set user
     *
     * @param \SG\FoBundle\Entity\Users $user
     * @return Comments
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