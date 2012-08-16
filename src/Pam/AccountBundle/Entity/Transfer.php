<?php

namespace Pam\AccountBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pam\AccountBundle\Entity\Transfer
 */
class Transfer
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
     * @var decimal $value
     */
    private $value;

    /**
     * @var datetime $data
     */
    private $data;

    /**
     * @var Pam\AccountBundle\Entity\Account
     */
    private $fromAccount;

    /**
     * @var Pam\AccountBundle\Entity\Account
     */
    private $toAccount;

    /**
     * @var Pam\AccountBundle\Entity\User
     */
    private $user;


    /**
     * Set value
     *
     * @param decimal $value
     * @return Transfer
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Get value
     *
     * @return decimal 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set data
     *
     * @param datetime $data
     * @return Transfer
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Get data
     *
     * @return datetime 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set fromAccount
     *
     * @param Pam\AccountBundle\Entity\Account $fromAccount
     * @return Transfer
     */
    public function setFromAccount(\Pam\AccountBundle\Entity\Account $fromAccount = null)
    {
        $this->fromAccount = $fromAccount;
        return $this;
    }

    /**
     * Get fromAccount
     *
     * @return Pam\AccountBundle\Entity\Account 
     */
    public function getFromAccount()
    {
        return $this->fromAccount;
    }

    /**
     * Set toAccount
     *
     * @param Pam\AccountBundle\Entity\Account $toAccount
     * @return Transfer
     */
    public function setToAccount(\Pam\AccountBundle\Entity\Account $toAccount = null)
    {
        $this->toAccount = $toAccount;
        return $this;
    }

    /**
     * Get toAccount
     *
     * @return Pam\AccountBundle\Entity\Account 
     */
    public function getToAccount()
    {
        return $this->toAccount;
    }

    /**
     * Set user
     *
     * @param Pam\AccountBundle\Entity\User $user
     * @return Transfer
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