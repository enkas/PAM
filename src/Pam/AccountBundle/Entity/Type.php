<?php

namespace Pam\AccountBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pam\AccountBundle\Entity\Type
 */
class Type
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
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $accounts;

    public function __construct()
    {
        $this->accounts = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set name
     *
     * @param string $name
     * @return Type
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
     * Add accounts
     *
     * @param Pam\AccountBundle\Entity\Account $accounts
     * @return Type
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
}