<?php

namespace Kayneth\CreationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;
use Kayneth\UserBundle\KaynethUserBundle as User;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Creation
 *
 * @ORM\Table(name="cb_creation")
 * @ORM\Entity(repositoryClass="Kayneth\CreationBundle\Repository\CreationRepository")
 * @ORM\HasLifecycleCallbacks
 * @ExclusionPolicy("none")
 */
class Creation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @Expose
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     *
     * @Expose
     */
    private $title;

    /**
     * @var string
     *
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     *
     * @Expose
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255)
     *
     * @Expose
     */
    private $link;

    /**
     * @ORM\OneToOne(targetEntity="Kayneth\FileBundle\Entity\File", cascade={"persist", "remove"})
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     *
     * @Expose
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetimetz")
     *
     * @Expose
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetimetz", nullable=true)
     *
     * @Expose
     */
    private $updatedAt;


    /**
     * @var User $user
     *
     * @Gedmo\Blameable(on="create")
     * @ORM\ManyToOne(targetEntity="Kayneth\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     *
     * @Expose
     */
    private $user;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Kayneth\CreationBundle\Entity\Category")
     * @ORM\JoinColumn(nullable=false)
     *
     * @Expose
     */
    private $category;


    /**
     * Get id
     *
     * @return int
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
     * @return Creation
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
     * Set slug
     *
     * @param string $slug
     *
     * @return Creation
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return Creation
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Creation
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Creation
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Creation
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set image
     *
     * @param \Kayneth\FileBundle\Entity\File $image
     *
     * @return Creation
     */
    public function setImage(\Kayneth\FileBundle\Entity\File $image = null)
    {
        $this->image = $image;
        $this->setImageDir();
        return $this;
    }
    /**
     * Get thumbnail
     *
     * @return \Kayneth\FileBundle\Entity\File
     */
    public function getImage()
    {
        if ($this->image != null) {
            $this->setThumbnailDir();
        }
        return $this->thumbnail;
    }
    public function setImageDir()
    {
        $dir = "uploads/files/creation/".$this->slug."/image/";
        $this->image->setUploadDir($dir);
        return $this;
    }
}

