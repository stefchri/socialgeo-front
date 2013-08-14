<?php

namespace SG\FoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * Roles
 *
 * @ORM\Table(name="roles")
 * @ORM\Entity
 */
class Roles implements RoleInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="role_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $roleId;

    /**
     * @var string
     *
     * @ORM\Column(name="role_description", type="text", nullable=true)
     */
    private $roleDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="role_name", type="string", length=128, nullable=false)
     */
    private $roleName;

    /**
     * @var boolean
     *
     * @ORM\Column(name="role_order", type="boolean", nullable=false)
     */
    private $roleOrder;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Users", mappedBy="role")
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Get roleId
     *
     * @return integer 
     */
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * Set roleDescription
     *
     * @param string $roleDescription
     * @return Roles
     */
    public function setRoleDescription($roleDescription)
    {
        $this->roleDescription = $roleDescription;
    
        return $this;
    }

    /**
     * Get roleDescription
     *
     * @return string 
     */
    public function getRoleDescription()
    {
        return $this->roleDescription;
    }

    /**
     * Set roleName
     *
     * @param string $roleName
     * @return Roles
     */
    public function setRoleName($roleName)
    {
        $this->roleName = $roleName;
    
        return $this;
    }

    /**
     * Get roleName
     *
     * @return string 
     */
    public function getRoleName()
    {
        return $this->roleName;
    }

    /**
     * Set roleOrder
     *
     * @param boolean $roleOrder
     * @return Roles
     */
    public function setRoleOrder($roleOrder)
    {
        $this->roleOrder = $roleOrder;
    
        return $this;
    }

    /**
     * Get roleOrder
     *
     * @return boolean 
     */
    public function getRoleOrder()
    {
        return $this->roleOrder;
    }

    /**
     * Add user
     *
     * @param \SG\FoBundle\Entity\Users $user
     * @return Roles
     */
    public function addUser(\SG\FoBundle\Entity\Users $user)
    {
        $this->user[] = $user;
    
        return $this;
    }

    /**
     * Remove user
     *
     * @param \SG\FoBundle\Entity\Users $user
     */
    public function removeUser(\SG\FoBundle\Entity\Users $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUser()
    {
        return $this->user;
    }
    
    public function getRole() {
        return $this->getRoleName();
    }
}