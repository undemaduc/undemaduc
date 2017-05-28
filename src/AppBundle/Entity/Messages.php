<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;


/**
 * Class Messages
 * @package AppBundle\Entity4
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MessagesRepository")
 * @ORM\Table("messages")
 * @ORM\HasLifecycleCallbacks()
 */
class Messages
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="message", type="text", nullable=false)
     */
    protected $message;

    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="User", inversedBy="messagesTo")
     * @ORM\JoinColumn(name="to_user", referencedColumnName="id", nullable=true)
     * @JMS\Type("string")
     */
    protected $toUser;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="User", inversedBy="messagesFrom")
     * @ORM\JoinColumn(name="from_user", referencedColumnName="id", nullable=true)
     * @JMS\Type("string")
     */
    protected $fromUser;

    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="Luser", inversedBy="messagesTo")
     * @ORM\JoinColumn(name="to_luser", referencedColumnName="id", nullable=true)
     * @JMS\Type("string")
     */
    protected $toLuser;

    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="Luser", inversedBy="messagesFrom")
     * @ORM\JoinColumn(name="from_luser", referencedColumnName="id", nullable=true)
     * @JMS\Type("string")
     */
    protected $fromLuser;

    /**
     * @var \DateTime
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    public $createdAt;

    /**
     * @param string $message
     * @return Messages
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param int $toUser
     * @return Messages
     */
    public function setToUser($toUser)
    {
        $this->toUser = $toUser;

        return $this;
    }

    /**
     * @return int
     */
    public function getToUser()
    {
        return $this->toUser;
    }

    /**
     * @param int $fromUser
     * @return Messages
     */
    public function setFromUser($fromUser)
    {
        $this->fromUser = $fromUser;

        return $this;
    }

    /**
     * @return User
     */
    public function getFromUser()
    {
        return $this->fromUser;
    }


    /**
     * @param int $toLuser
     * @return Messages
     */
    public function setToLuser($toLuser)
    {
        $this->toLuser = $toLuser;

        return $this;
    }

    /**
     * @return int
     */
    public function getToLuser()
    {
        return $this->toLuser;
    }

    /**
     * @param int $fromLuser
     * @return Messages
     */
    public function setFromLuser($fromLuser)
    {
        $this->fromLuser = $fromLuser;

        return $this;
    }

    /**
     * @return int
     */
    public function getFromLuser()
    {
        return $this->fromLuser;
    }

    /**
     * @ORM\PreFlush()
     *
     * @return Messages
     */
    public function setCreatedAt()
    {
        $this->createdAt = new \DateTime('now');

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
