<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	/**
     * @ORM\OneToMany(targetEntity="Advertisment", mappedBy="user")
     */
    protected $advertisments;

    public function __construct()
    {
        parent::__construct();
		
		$this->products = new ArrayCollection();
    }

    /**
     * Add advertisment
     *
     * @param \AppBundle\Entity\Advertisment $advertisment
     *
     * @return User
     */
    public function addAdvertisment(\AppBundle\Entity\Advertisment $advertisment)
    {
        $this->advertisments[] = $advertisment;

        return $this;
    }

    /**
     * Remove advertisment
     *
     * @param \AppBundle\Entity\Advertisment $advertisment
     */
    public function removeAdvertisment(\AppBundle\Entity\Advertisment $advertisment)
    {
        $this->advertisments->removeElement($advertisment);
    }

    /**
     * Get advertisments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdvertisments()
    {
        return $this->advertisments;
    }
}
