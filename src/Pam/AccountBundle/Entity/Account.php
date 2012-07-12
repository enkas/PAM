<?php

namespace Pam\AccountBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pam\AccountBundle\Entity\Account
 */
class Account
{
    /**
     * @var integer $id
     */
    private $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @var string $name
     */
    private $name;

    /**
     * @var Pam\AccountBundle\Entity\Type
     */
    private $type;


    /**
     * Set name
     *
     * @param string $name
     * @return Account
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set type
     *
     * @param Pam\AccountBundle\Entity\Type $type
     * @return Account
     */
    public function setType(\Pam\AccountBundle\Entity\Type $type = null)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get type
     *
     * @return Pam\AccountBundle\Entity\Type 
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * @var Pam\AccountBundle\Entity\User
     */
    private $user;


    /**
     * Set user
     *
     * @param Pam\AccountBundle\Entity\User $user
     * @return Account
     */
    public function setUser(\Pam\AccountBundle\Entity\User $user = null)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Get user
     *
     * @return Pam\AccountBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}