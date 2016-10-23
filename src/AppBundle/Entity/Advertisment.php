<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="advertisment")
 */
class Advertisment
{
	/**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
	
	/**
     * @ORM\Column(type="string", length=255)
     */
    private $title;
	
	/**
     * @ORM\Column(type="text")
     */
    private $description;
	
	/**
	* @ORM\Column(type="datetime")
	*/
    private $posting_date;
	
	/**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="advertisments")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

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
     * Set title
     *
     * @param string $title
     *
     * @return Advertisment
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Advertisment
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set postingDate
     *
     * @param \DateTime $postingDate
     *
     * @return Advertisment
     */
    public function setPostingDate($postingDate)
    {
        $this->posting_date = $postingDate;

        return $this;
    }

    /**
     * Get postingDate
     *
     * @return \DateTime
     */
    public function getPostingDate()
    {
        return $this->posting_date;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Advertisment
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
