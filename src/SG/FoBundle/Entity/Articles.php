<?php

namespace SG\FoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Articles
 *
 * @ORM\Table(name="articles")
 * @ORM\Entity
 */
class Articles
{
    /**
     * @var integer
     *
     * @ORM\Column(name="article_id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $articleId;

    /**
     * @var string
     *
     * @ORM\Column(name="article_title", type="string", length=255, nullable=false)
     */
    private $articleTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="article_synopsis", type="string", length=255, nullable=false)
     */
    private $articleSynopsis;

    /**
     * @var string
     *
     * @ORM\Column(name="article_body", type="text", nullable=false)
     */
    private $articleBody;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="article_createddate", type="datetime", nullable=false)
     */
    private $articleCreateddate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="article_modifieddate", type="datetime", nullable=true)
     */
    private $articleModifieddate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="article_deleteddate", type="datetime", nullable=true)
     */
    private $articleDeleteddate;

    /**
     * @var string
     *
     * @ORM\Column(name="article_imageurl", type="string", length=255, nullable=true)
     */
    private $articleImageurl;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="article_approveddate", type="datetime", nullable=true)
     */
    private $articleApproveddate;

    /**
     * @var integer
     *
     * @ORM\Column(name="article_plusvotes", type="integer", nullable=true)
     */
    private $articlePlusvotes;

    /**
     * @var integer
     *
     * @ORM\Column(name="article_minvotes", type="integer", nullable=true)
     */
    private $articleMinvotes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Categories", inversedBy="article")
     * @ORM\JoinTable(name="articles_has_categories",
     *   joinColumns={
     *     @ORM\JoinColumn(name="article", referencedColumnName="article_id")
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
     * @ORM\ManyToMany(targetEntity="Comments", inversedBy="article")
     * @ORM\JoinTable(name="articles_has_comments",
     *   joinColumns={
     *     @ORM\JoinColumn(name="article", referencedColumnName="article_id")
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
     * @ORM\ManyToMany(targetEntity="Users", mappedBy="articleFollowed")
     */
    private $userFollowing;

    /**
     * @var \Addresses
     *
     * @ORM\ManyToOne(targetEntity="Addresses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="address_id", referencedColumnName="address_id")
     * })
     */
    private $address;

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
        $this->category = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comment = new \Doctrine\Common\Collections\ArrayCollection();
        $this->userFollowing = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Get articleId
     *
     * @return integer 
     */
    public function getArticleId()
    {
        return $this->articleId;
    }

    /**
     * Set articleTitle
     *
     * @param string $articleTitle
     * @return Articles
     */
    public function setArticleTitle($articleTitle)
    {
        $this->articleTitle = $articleTitle;
    
        return $this;
    }

    /**
     * Get articleTitle
     *
     * @return string 
     */
    public function getArticleTitle()
    {
        return $this->articleTitle;
    }

    /**
     * Set articleSynopsis
     *
     * @param string $articleSynopsis
     * @return Articles
     */
    public function setArticleSynopsis($articleSynopsis)
    {
        $this->articleSynopsis = $articleSynopsis;
    
        return $this;
    }

    /**
     * Get articleSynopsis
     *
     * @return string 
     */
    public function getArticleSynopsis()
    {
        return $this->articleSynopsis;
    }

    /**
     * Set articleBody
     *
     * @param string $articleBody
     * @return Articles
     */
    public function setArticleBody($articleBody)
    {
        $this->articleBody = $articleBody;
    
        return $this;
    }

    /**
     * Get articleBody
     *
     * @return string 
     */
    public function getArticleBody()
    {
        return $this->articleBody;
    }

    /**
     * Set articleCreateddate
     *
     * @param \DateTime $articleCreateddate
     * @return Articles
     */
    public function setArticleCreateddate($articleCreateddate)
    {
        $this->articleCreateddate = $articleCreateddate;
    
        return $this;
    }

    /**
     * Get articleCreateddate
     *
     * @return \DateTime 
     */
    public function getArticleCreateddate()
    {
        return $this->articleCreateddate;
    }

    /**
     * Set articleModifieddate
     *
     * @param \DateTime $articleModifieddate
     * @return Articles
     */
    public function setArticleModifieddate($articleModifieddate)
    {
        $this->articleModifieddate = $articleModifieddate;
    
        return $this;
    }

    /**
     * Get articleModifieddate
     *
     * @return \DateTime 
     */
    public function getArticleModifieddate()
    {
        return $this->articleModifieddate;
    }

    /**
     * Set articleDeleteddate
     *
     * @param \DateTime $articleDeleteddate
     * @return Articles
     */
    public function setArticleDeleteddate($articleDeleteddate)
    {
        $this->articleDeleteddate = $articleDeleteddate;
    
        return $this;
    }

    /**
     * Get articleDeleteddate
     *
     * @return \DateTime 
     */
    public function getArticleDeleteddate()
    {
        return $this->articleDeleteddate;
    }

    /**
     * Set articleImageurl
     *
     * @param string $articleImageurl
     * @return Articles
     */
    public function setArticleImageurl($articleImageurl)
    {
        $this->articleImageurl = $articleImageurl;
    
        return $this;
    }

    /**
     * Get articleImageurl
     *
     * @return string 
     */
    public function getArticleImageurl()
    {
        return $this->articleImageurl;
    }

    /**
     * Set articleApproveddate
     *
     * @param \DateTime $articleApproveddate
     * @return Articles
     */
    public function setArticleApproveddate($articleApproveddate)
    {
        $this->articleApproveddate = $articleApproveddate;
    
        return $this;
    }

    /**
     * Get articleApproveddate
     *
     * @return \DateTime 
     */
    public function getArticleApproveddate()
    {
        return $this->articleApproveddate;
    }

    /**
     * Set articlePlusvotes
     *
     * @param integer $articlePlusvotes
     * @return Articles
     */
    public function setArticlePlusvotes($articlePlusvotes)
    {
        $this->articlePlusvotes = $articlePlusvotes;
    
        return $this;
    }

    /**
     * Get articlePlusvotes
     *
     * @return integer 
     */
    public function getArticlePlusvotes()
    {
        return $this->articlePlusvotes;
    }

    /**
     * Set articleMinvotes
     *
     * @param integer $articleMinvotes
     * @return Articles
     */
    public function setArticleMinvotes($articleMinvotes)
    {
        $this->articleMinvotes = $articleMinvotes;
    
        return $this;
    }

    /**
     * Get articleMinvotes
     *
     * @return integer 
     */
    public function getArticleMinvotes()
    {
        return $this->articleMinvotes;
    }

    /**
     * Add category
     *
     * @param \SG\FoBundle\Entity\Categories $category
     * @return Articles
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
     * @return Articles
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
     * @return Articles
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
     * Set address
     *
     * @param \SG\FoBundle\Entity\Addresses $address
     * @return Articles
     */
    public function setAddress(\SG\FoBundle\Entity\Addresses $address = null)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return \SG\FoBundle\Entity\Addresses 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set user
     *
     * @param \SG\FoBundle\Entity\Users $user
     * @return Articles
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