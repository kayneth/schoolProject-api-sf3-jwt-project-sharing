<?php

namespace Kayneth\CreationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Kayneth\UserBundle\Entity\User;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\SerializedName;

use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Note
 *
 * @ORM\Table(name="cb_score")
 * @ORM\Entity(repositoryClass="Kayneth\CreationBundle\Repository\ScoreRepository")
 * @ExclusionPolicy("none")
 * @UniqueEntity(
 *     fields={"creation", "user"},
 *     errorPath="user",
 *     message="Vous ne pouvez noter une création qu'une fois"
 * )
 */
class Score
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="note", type="integer")
     */
    private $note;

    /**
     * @var User $user
     *
     * @ORM\ManyToOne(targetEntity="Kayneth\CreationBundle\Entity\Creation")
     * @ORM\JoinColumn(nullable=false)
     *
     * @Expose
     */
    private $creation;

    /**
     * @var User $user
     *
     * //@Gedmo\Blameable(on="create")
     * @ORM\ManyToOne(targetEntity="Kayneth\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     *
     * @Expose
     */
    private $user;


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
     * Set note
     *
     * @param integer $note
     *
     * @return Note
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return int
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set creation
     *
     * @param \Kayneth\CreationBundle\Entity\Creation $creation
     *
     * @return Score
     */
    public function setCreation(\Kayneth\CreationBundle\Entity\Creation $creation)
    {
        $this->creation = $creation;

        return $this;
    }

    /**
     * Get creation
     *
     * @return \Kayneth\CreationBundle\Entity\Creation
     */
    public function getCreation()
    {
        return $this->creation;
    }

    /**
     * Set user
     *
     * @param \Kayneth\UserBundle\Entity\User $user
     *
     * @return Score
     */
    public function setUser(\Kayneth\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Kayneth\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
