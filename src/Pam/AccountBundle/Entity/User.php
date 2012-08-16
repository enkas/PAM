<?php

namespace Pam\AccountBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pam\AccountBundle\Entity\User
 */
class User
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
     * @var string $email
     */
    private $email;


    /**
     * Set name
     *
     * @param string $name
     * @return User
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
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @var string $username
     */
    private $username;


    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $accounts;

    public function __construct()
    {
        $this->accounts = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add accounts
     *
     * @param Pam\AccountBundle\Entity\Account $accounts
     * @return User
     */
    public function addAccount(\Pam\AccountBundle\Entity\Account $accounts)
    {
        $this->accounts[] = $accounts;
        return $this;
    }

    /**
     * Remove accounts
     *
     * @param <variableType$accounts
     */
    public function removeAccount(\Pam\AccountBundle\Entity\Account $accounts)
    {
        $this->accounts->removeElement($accounts);
    }

    /**
     * Get accounts
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getAccounts()
    {
        return $this->accounts;
    }
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $transfers;


    /**
     * Add transfers
     *
     * @param Pam\AccountBundle\Entity\Transfer $transfers
     * @return User
     */
    public function addTransfer(\Pam\AccountBundle\Entity\Transfer $transfers)
    {
        $this->transfers[] = $transfers;
        return $this;
    }

    /**
     * Remove transfers
     *
     * @param <variableType$transfers
     */
    public function removeTransfer(\Pam\AccountBundle\Entity\Transfer $transfers)
    {
        $this->transfers->removeElement($transfers);
    }

    /**
     * Get transfers
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getTransfers()
    {
        return $this->transfers;
    }
}