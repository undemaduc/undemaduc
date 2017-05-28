<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\Table(name="user")
 */
class User implements AdvancedUserInterface, \Serializable
{
    const ROLE_DEFAULT = 'ROLE_USER';

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=64)
     * @JMS\Exclude
     */
    protected $password;

    /**
     * @var string
     *
     * @Assert\Length(
     *     min=5,
     *     max=64
     * )
     */
    public $plainPassword;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=60, unique=true)
     * @Assert\Email()
     * @Assert\NotBlank()
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * @Assert\NotBlank()
     */
    protected $description;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer")
     *
     * @Assert\NotBlank()
     * @Assert\GreaterThanOrEqual(18)
     */
    protected $age;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string")
     * @Assert\NotBlank()
     */
    protected $gender;

    /**
     * @var string
     * @ORM\Column(name="phone_number", type="string", nullable=true)
     */
    protected $phoneNumber;

    /**
     * Image File
     *
     * @var File|UploadedFile
     */
    private $file;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", nullable=true)
     */
    protected $path;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Match", mappedBy="user")
     */
    protected $matches;

    /**
     * @var bool
     * @ORM\Column(name="is_active", type="boolean")
     * @JMS\Exclude
     */
    private $isActive;


    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Messages", mappedBy="fromUser")
     */
    protected $messagesFrom;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Messages", mappedBy="toUser")
     */
    protected $messagesTo;

    public function __construct()
    {
        $this->isActive = true;
    }

    /**
     * Called after entity persistence
     *
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        // The file property can be empty if the field is not required
        if (null === $this->file) {
            return;
        }

        // Use the original file name here but you should
        // sanitize it at least to avoid any security issues
        $filename = sha1(uniqid(mt_rand(), true));

        // move takes the target directory and then the
        // target filename to move to
        $this->file->move(
            $this->getUploadRootDir(),
            $filename.'.'.$this->file->guessExtension()
        );

        // set the path property to the filename where you've saved the file
        $this->path = $filename.'.'.$this->file->guessExtension();


        // Clean up the file property as you won't need it anymore
        $this->file = null;
    }

    /**
     * Sets file.
     *
     * @param File|UploadedFile $file
     *
     * @return User
     */
    public function setFile(File $file = null)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file.
     *
     * @return File|UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Returns the roles granted to the user.
     *
     * @return array (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return [self::ROLE_DEFAULT];
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        $this->plainPassword = null;
    }

    /**
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->email;
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(
            array(
                $this->id,
                $this->email,
                $this->password,
            )
        );
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id, $this->email, $this->password,
            ) = unserialize($serialized);
    }

    /**
     * @return bool
     */
    public function isAccountNonExpired()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isAccountNonLocked()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isCredentialsNonExpired()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->isActive;
    }

    /**
     * @return string
     */
    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/user/';
    }

    /**
     * @param string $description
     *
     * @return User
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * @param int $age
     *
     * @return User
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
}

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param string $gender
     *
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return bool
     */
    public function isNew()
    {
        return isset($this->id);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param string $plainPassword
     *
     * @return User
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    /**
     * @param string $path
     *
     * @return User
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @param string $phoneNumber
     * @return User
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
}