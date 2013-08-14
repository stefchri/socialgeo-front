<?php

namespace SG\FoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class Users implements AdvancedUserInterface
{
    
    public function isAccountNonExpired() {
        return true;
    }

    public function isAccountNonLocked() {
        
        if ($this->userLockeddate) {
            return FALSE;
        }
        return TRUE;
    }

    public function isCredentialsNonExpired() {
        //throw new \Symfony\Component\Locale\Exception\NotImplementedException();
        return true;
    }

    public function isEnabled() {
        if ($this->userActivationdate) {
            return true;
        }
        return false;
    }

    public function eraseCredentials() {
        //blabla
    }

    public function getPassword() {
        return $this->userPassword;
    }

    public function getRoles() {
        return $this->role->toArray();
    }

    public function getUsername() {
        return $this->userUsername;
    }
    
    public function getSalt() {
        return $this->userPasswordsalt;
    }
    
    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="user_firstname", type="string", length=255, nullable=false)
     */
    private $userFirstname;

    /**
     * @var string
     *
     * @ORM\Column(name="user_surname", type="string", length=255, nullable=false)
     */
    private $userSurname;

    /**
     * @var string
     *
     * @ORM\Column(name="user_username", type="string", length=255, nullable=false)
     */
    private $userUsername;

    /**
     * @var string
     *
     * @ORM\Column(name="user_password", type="string", length=64, nullable=false)
     */
    private $userPassword;

    /**
     * @var string
     *
     * @ORM\Column(name="user_passwordsalt", type="string", length=128, nullable=false)
     */
    private $userPasswordsalt;

    /**
     * @var string
     *
     * @ORM\Column(name="user_email", type="string", length=255, nullable=false)
     */
    private $userEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="user_avatarurl", type="string", length=255, nullable=true)
     */
    private $userAvatarurl;

    /**
     * @var string
     *
     * @ORM\Column(name="user_securityquestion", type="string", length=500, nullable=false)
     */
    private $userSecurityquestion;

    /**
     * @var string
     *
     * @ORM\Column(name="user_securityanswer", type="string", length=255, nullable=false)
     */
    private $userSecurityanswer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="user_createddate", type="datetime", nullable=false)
     */
    private $userCreateddate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="user_modifieddate", type="datetime", nullable=true)
     */
    private $userModifieddate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="user_deleteddate", type="datetime", nullable=true)
     */
    private $userDeleteddate;

    /**
     * @var string
     *
     * @ORM\Column(name="user_activationkey", type="string", length=64, nullable=true)
     */
    private $userActivationkey;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="user_activationdate", type="datetime", nullable=true)
     */
    private $userActivationdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="user_lockeddate", type="datetime", nullable=true)
     */
    private $userLockeddate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="user_lastlogindate", type="datetime", nullable=true)
     */
    private $userLastlogindate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="user_lastactivitydate", type="datetime", nullable=true)
     */
    private $userLastactivitydate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="user_lastpasswordchangeddate", type="datetime", nullable=true)
     */
    private $userLastpasswordchangeddate;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_amountloggedin", type="bigint", nullable=true)
     */
    private $userAmountloggedin;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_mediavotes", type="integer", nullable=true)
     */
    private $userMediavotes;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_articlevotes", type="integer", nullable=true)
     */
    private $userArticlevotes;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_eventvotes", type="integer", nullable=true)
     */
    private $userEventvotes;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_createditems", type="integer", nullable=true)
     */
    private $userCreateditems;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Articles", inversedBy="userFollowing")
     * @ORM\JoinTable(name="users_follow_articles",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_following", referencedColumnName="user_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="article_followed", referencedColumnName="article_id")
     *   }
     * )
     */
    private $articleFollowed;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Events", inversedBy="userFollowing")
     * @ORM\JoinTable(name="users_follow_events",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_following", referencedColumnName="user_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="event_followed", referencedColumnName="event_id")
     *   }
     * )
     */
    private $eventFollowed;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Media", inversedBy="userFollowing")
     * @ORM\JoinTable(name="users_follow_media",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_following", referencedColumnName="user_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="media_followed", referencedColumnName="media_id")
     *   }
     * )
     */
    private $mediaFollowed;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Roles", inversedBy="user")
     * @ORM\JoinTable(name="users_has_roles",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user", referencedColumnName="user_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="role", referencedColumnName="role_id")
     *   }
     * )
     */
    private $role;

    /**
     * @var \Addresses
     *
     * @ORM\ManyToOne(targetEntity="Addresses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_currentaddress", referencedColumnName="address_id")
     * })
     */
    private $userCurrentaddress;

    /**
     * @var \Addresses
     *
     * @ORM\ManyToOne(targetEntity="Addresses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_homeaddress", referencedColumnName="address_id")
     * })
     */
    private $userHomeaddress;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->articleFollowed = new \Doctrine\Common\Collections\ArrayCollection();
        $this->eventFollowed = new \Doctrine\Common\Collections\ArrayCollection();
        $this->mediaFollowed = new \Doctrine\Common\Collections\ArrayCollection();
        $this->role = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set userFirstname
     *
     * @param string $userFirstname
     * @return Users
     */
    public function setUserFirstname($userFirstname)
    {
        $this->userFirstname = $userFirstname;
    
        return $this;
    }

    /**
     * Get userFirstname
     *
     * @return string 
     */
    public function getUserFirstname()
    {
        return $this->userFirstname;
    }

    /**
     * Set userSurname
     *
     * @param string $userSurname
     * @return Users
     */
    public function setUserSurname($userSurname)
    {
        $this->userSurname = $userSurname;
    
        return $this;
    }

    /**
     * Get userSurname
     *
     * @return string 
     */
    public function getUserSurname()
    {
        return $this->userSurname;
    }

    /**
     * Set userUsername
     *
     * @param string $userUsername
     * @return Users
     */
    public function setUserUsername($userUsername)
    {
        $this->userUsername = $userUsername;
    
        return $this;
    }

    /**
     * Get userUsername
     *
     * @return string 
     */
    public function getUserUsername()
    {
        return $this->userUsername;
    }

    /**
     * Set userPassword
     *
     * @param string $userPassword
     * @return Users
     */
    public function setUserPassword($userPassword)
    {
        $this->userPassword = $userPassword;
    
        return $this;
    }

    /**
     * Get userPassword
     *
     * @return string 
     */
    public function getUserPassword()
    {
        return $this->userPassword;
    }

    /**
     * Set userPasswordsalt
     *
     * @param string $userPasswordsalt
     * @return Users
     */
    public function setUserPasswordsalt($userPasswordsalt)
    {
        $this->userPasswordsalt = $userPasswordsalt;
    
        return $this;
    }

    /**
     * Get userPasswordsalt
     *
     * @return string 
     */
    public function getUserPasswordsalt()
    {
        return $this->userPasswordsalt;
    }

    /**
     * Set userEmail
     *
     * @param string $userEmail
     * @return Users
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;
    
        return $this;
    }

    /**
     * Get userEmail
     *
     * @return string 
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * Set userAvatarurl
     *
     * @param string $userAvatarurl
     * @return Users
     */
    public function setUserAvatarurl($userAvatarurl)
    {
        $this->userAvatarurl = $userAvatarurl;
    
        return $this;
    }

    /**
     * Get userAvatarurl
     *
     * @return string 
     */
    public function getUserAvatarurl()
    {
        return $this->userAvatarurl;
    }

    /**
     * Set userSecurityquestion
     *
     * @param string $userSecurityquestion
     * @return Users
     */
    public function setUserSecurityquestion($userSecurityquestion)
    {
        $this->userSecurityquestion = $userSecurityquestion;
    
        return $this;
    }

    /**
     * Get userSecurityquestion
     *
     * @return string 
     */
    public function getUserSecurityquestion()
    {
        return $this->userSecurityquestion;
    }

    /**
     * Set userSecurityanswer
     *
     * @param string $userSecurityanswer
     * @return Users
     */
    public function setUserSecurityanswer($userSecurityanswer)
    {
        $this->userSecurityanswer = $userSecurityanswer;
    
        return $this;
    }

    /**
     * Get userSecurityanswer
     *
     * @return string 
     */
    public function getUserSecurityanswer()
    {
        return $this->userSecurityanswer;
    }

    /**
     * Set userCreateddate
     *
     * @param \DateTime $userCreateddate
     * @return Users
     */
    public function setUserCreateddate($userCreateddate)
    {
        $this->userCreateddate = $userCreateddate;
    
        return $this;
    }

    /**
     * Get userCreateddate
     *
     * @return \DateTime 
     */
    public function getUserCreateddate()
    {
        return $this->userCreateddate;
    }

    /**
     * Set userModifieddate
     *
     * @param \DateTime $userModifieddate
     * @return Users
     */
    public function setUserModifieddate($userModifieddate)
    {
        $this->userModifieddate = $userModifieddate;
    
        return $this;
    }

    /**
     * Get userModifieddate
     *
     * @return \DateTime 
     */
    public function getUserModifieddate()
    {
        return $this->userModifieddate;
    }

    /**
     * Set userDeleteddate
     *
     * @param \DateTime $userDeleteddate
     * @return Users
     */
    public function setUserDeleteddate($userDeleteddate)
    {
        $this->userDeleteddate = $userDeleteddate;
    
        return $this;
    }

    /**
     * Get userDeleteddate
     *
     * @return \DateTime 
     */
    public function getUserDeleteddate()
    {
        return $this->userDeleteddate;
    }

    /**
     * Set userActivationkey
     *
     * @param string $userActivationkey
     * @return Users
     */
    public function setUserActivationkey($userActivationkey)
    {
        $this->userActivationkey = $userActivationkey;
    
        return $this;
    }

    /**
     * Get userActivationkey
     *
     * @return string 
     */
    public function getUserActivationkey()
    {
        return $this->userActivationkey;
    }

    /**
     * Set userActivationdate
     *
     * @param \DateTime $userActivationdate
     * @return Users
     */
    public function setUserActivationdate($userActivationdate)
    {
        $this->userActivationdate = $userActivationdate;
    
        return $this;
    }

    /**
     * Get userActivationdate
     *
     * @return \DateTime 
     */
    public function getUserActivationdate()
    {
        return $this->userActivationdate;
    }

    /**
     * Set userLockeddate
     *
     * @param \DateTime $userLockeddate
     * @return Users
     */
    public function setUserLockeddate($userLockeddate)
    {
        $this->userLockeddate = $userLockeddate;
    
        return $this;
    }

    /**
     * Get userLockeddate
     *
     * @return \DateTime 
     */
    public function getUserLockeddate()
    {
        return $this->userLockeddate;
    }

    /**
     * Set userLastlogindate
     *
     * @param \DateTime $userLastlogindate
     * @return Users
     */
    public function setUserLastlogindate($userLastlogindate)
    {
        $this->userLastlogindate = $userLastlogindate;
    
        return $this;
    }

    /**
     * Get userLastlogindate
     *
     * @return \DateTime 
     */
    public function getUserLastlogindate()
    {
        return $this->userLastlogindate;
    }

    /**
     * Set userLastactivitydate
     *
     * @param \DateTime $userLastactivitydate
     * @return Users
     */
    public function setUserLastactivitydate($userLastactivitydate)
    {
        $this->userLastactivitydate = $userLastactivitydate;
    
        return $this;
    }

    /**
     * Get userLastactivitydate
     *
     * @return \DateTime 
     */
    public function getUserLastactivitydate()
    {
        return $this->userLastactivitydate;
    }

    /**
     * Set userLastpasswordchangeddate
     *
     * @param \DateTime $userLastpasswordchangeddate
     * @return Users
     */
    public function setUserLastpasswordchangeddate($userLastpasswordchangeddate)
    {
        $this->userLastpasswordchangeddate = $userLastpasswordchangeddate;
    
        return $this;
    }

    /**
     * Get userLastpasswordchangeddate
     *
     * @return \DateTime 
     */
    public function getUserLastpasswordchangeddate()
    {
        return $this->userLastpasswordchangeddate;
    }

    /**
     * Set userAmountloggedin
     *
     * @param integer $userAmountloggedin
     * @return Users
     */
    public function setUserAmountloggedin($userAmountloggedin)
    {
        $this->userAmountloggedin = $userAmountloggedin;
    
        return $this;
    }

    /**
     * Get userAmountloggedin
     *
     * @return integer 
     */
    public function getUserAmountloggedin()
    {
        return $this->userAmountloggedin;
    }

    /**
     * Set userMediavotes
     *
     * @param integer $userMediavotes
     * @return Users
     */
    public function setUserMediavotes($userMediavotes)
    {
        $this->userMediavotes = $userMediavotes;
    
        return $this;
    }

    /**
     * Get userMediavotes
     *
     * @return integer 
     */
    public function getUserMediavotes()
    {
        return $this->userMediavotes;
    }

    /**
     * Set userArticlevotes
     *
     * @param integer $userArticlevotes
     * @return Users
     */
    public function setUserArticlevotes($userArticlevotes)
    {
        $this->userArticlevotes = $userArticlevotes;
    
        return $this;
    }

    /**
     * Get userArticlevotes
     *
     * @return integer 
     */
    public function getUserArticlevotes()
    {
        return $this->userArticlevotes;
    }

    /**
     * Set userEventvotes
     *
     * @param integer $userEventvotes
     * @return Users
     */
    public function setUserEventvotes($userEventvotes)
    {
        $this->userEventvotes = $userEventvotes;
    
        return $this;
    }

    /**
     * Get userEventvotes
     *
     * @return integer 
     */
    public function getUserEventvotes()
    {
        return $this->userEventvotes;
    }

    /**
     * Set userCreateditems
     *
     * @param integer $userCreateditems
     * @return Users
     */
    public function setUserCreateditems($userCreateditems)
    {
        $this->userCreateditems = $userCreateditems;
    
        return $this;
    }

    /**
     * Get userCreateditems
     *
     * @return integer 
     */
    public function getUserCreateditems()
    {
        return $this->userCreateditems;
    }

    /**
     * Add articleFollowed
     *
     * @param \SG\FoBundle\Entity\Articles $articleFollowed
     * @return Users
     */
    public function addArticleFollowed(\SG\FoBundle\Entity\Articles $articleFollowed)
    {
        $this->articleFollowed[] = $articleFollowed;
    
        return $this;
    }

    /**
     * Remove articleFollowed
     *
     * @param \SG\FoBundle\Entity\Articles $articleFollowed
     */
    public function removeArticleFollowed(\SG\FoBundle\Entity\Articles $articleFollowed)
    {
        $this->articleFollowed->removeElement($articleFollowed);
    }

    /**
     * Get articleFollowed
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArticleFollowed()
    {
        return $this->articleFollowed;
    }

    /**
     * Add eventFollowed
     *
     * @param \SG\FoBundle\Entity\Events $eventFollowed
     * @return Users
     */
    public function addEventFollowed(\SG\FoBundle\Entity\Events $eventFollowed)
    {
        $this->eventFollowed[] = $eventFollowed;
    
        return $this;
    }

    /**
     * Remove eventFollowed
     *
     * @param \SG\FoBundle\Entity\Events $eventFollowed
     */
    public function removeEventFollowed(\SG\FoBundle\Entity\Events $eventFollowed)
    {
        $this->eventFollowed->removeElement($eventFollowed);
    }

    /**
     * Get eventFollowed
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEventFollowed()
    {
        return $this->eventFollowed;
    }

    /**
     * Add mediaFollowed
     *
     * @param \SG\FoBundle\Entity\Media $mediaFollowed
     * @return Users
     */
    public function addMediaFollowed(\SG\FoBundle\Entity\Media $mediaFollowed)
    {
        $this->mediaFollowed[] = $mediaFollowed;
    
        return $this;
    }

    /**
     * Remove mediaFollowed
     *
     * @param \SG\FoBundle\Entity\Media $mediaFollowed
     */
    public function removeMediaFollowed(\SG\FoBundle\Entity\Media $mediaFollowed)
    {
        $this->mediaFollowed->removeElement($mediaFollowed);
    }

    /**
     * Get mediaFollowed
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMediaFollowed()
    {
        return $this->mediaFollowed;
    }

    /**
     * Add role
     *
     * @param \SG\FoBundle\Entity\Roles $role
     * @return Users
     */
    public function addRole(\SG\FoBundle\Entity\Roles $role)
    {
        $this->role->add($role);
    
        return $this;
    }

    /**
     * Remove role
     *
     * @param \SG\FoBundle\Entity\Roles $role
     */
    public function removeRole(\SG\FoBundle\Entity\Roles $role)
    {
        $this->role->removeElement($role);
    }

    /**
     * Get role
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRole()
    {
        return $this->role->toArray();
    }

    /**
     * Set userCurrentaddress
     *
     * @param \SG\FoBundle\Entity\Addresses $userCurrentaddress
     * @return Users
     */
    public function setUserCurrentaddress(\SG\FoBundle\Entity\Addresses $userCurrentaddress = null)
    {
        $this->userCurrentaddress = $userCurrentaddress;
    
        return $this;
    }

    /**
     * Get userCurrentaddress
     *
     * @return \SG\FoBundle\Entity\Addresses 
     */
    public function getUserCurrentaddress()
    {
        return $this->userCurrentaddress;
    }

    /**
     * Set userHomeaddress
     *
     * @param \SG\FoBundle\Entity\Addresses $userHomeaddress
     * @return Users
     */
    public function setUserHomeaddress(\SG\FoBundle\Entity\Addresses $userHomeaddress = null)
    {
        $this->userHomeaddress = $userHomeaddress;
    
        return $this;
    }

    /**
     * Get userHomeaddress
     *
     * @return \SG\FoBundle\Entity\Addresses 
     */
    public function getUserHomeaddress()
    {
        return $this->userHomeaddress;
    }
    
    
}