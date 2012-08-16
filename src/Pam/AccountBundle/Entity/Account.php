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
    /**
     * @var decimal $balance
     */
    private $balance;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $income;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $expence;

    public function __construct()
    {
        $this->income = new \Doctrine\Common\Collections\ArrayCollection();
        $this->expence = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set balance
     *
     * @param decimal $balance
     * @return Account
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
        return $this;
    }

    /**
     * Get balance
     *
     * @return decimal 
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Add income
     *
     * @param Pam\AccountBundle\Entity\Transfer $income
     * @return Account
     */
    public function addIncome(\Pam\AccountBundle\Entity\Transfer $income)
    {
        $this->income[] = $income;
        return $this;
    }

    /**
     * Remove income
     *
     * @param <variableType$income
     */
    public function removeIncome(\Pam\AccountBundle\Entity\Transfer $income)
    {
        $this->income->removeElement($income);
    }

    /**
     * Get income
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getIncome()
    {
        return $this->income;
    }

    /**
     * Add expence
     *
     * @param Pam\AccountBundle\Entity\Transfer $expence
     * @return Account
     */
    public function addExpence(\Pam\AccountBundle\Entity\Transfer $expence)
    {
        $this->expence[] = $expence;
        return $this;
    }

    /**
     * Remove expence
     *
     * @param <variableType$expence
     */
    public function removeExpence(\Pam\AccountBundle\Entity\Transfer $expence)
    {
        $this->expence->removeElement($expence);
    }

    /**
     * Get expence
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getExpence()
    {
        return $this->expence;
    }
}