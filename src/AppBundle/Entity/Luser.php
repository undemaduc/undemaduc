<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Class Luser
 * @package AppBundle\Entity
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LuserRepository")
 * @ORM\Table("luser")
 *
 */
class Luser
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="email", type="string", unique=true)
     */
    protected $email;

    /**
     * @var string
     * @ORM\Column(name="name", type="string")
     */
    protected $name;

    /**
     * @var string
     * @ORM\Column(name="phone_number", type="string", nullable=true)
     */
    protected $phoneNumber;

    /**
     * @var string
     * @ORM\Column(name="town", type="string", nullable=true)
     */
    protected $town;

    /**
     * @var string
     * @ORM\Column(name="password", type="string")
     */
    protected $password;

    /**
     * @var string
     * @ORM\Column(name="description", type="string")
     */
    protected $description;

    /**
     * @var boolean
     * @ORM\Column(name="disable", type="boolean", options={"default" : "0"})
     */
    protected $disable;

    /**
     * @var integer
     * @ORM\Column(name="rooms", type="integer")
     */
    protected $rooms;

    /**
     * @var integer
     * @ORM\Column(name="beds", type="integer")
     */
    protected $beds;

    /**
     * Image File
     * @var File
    */
    private $file1;

    /**
     * @var string
     * @ORM\Column(name="path1", type="string", nullable=true)
     */
    protected $path1;

    /**
     * Image File
     * @var File
     */
    private $file2;

    /**
     * @var string
     * @ORM\Column(name="path2", type="string", nullable=true)
     */
    protected $path2;

    /**
     * Image File
     * @var File
     */
    private $file3;

    /**
     * @var string
     * @ORM\Column(name="path3", type="string", nullable=true)
     */
    protected $path3;

    /**
     * Image File
     * @var File
     */
    private $file4;

    /**
     * @var string
     * @ORM\Column(name="path4", type="string", nullable=true)
     */
    protected $path4;

    /**
     * Image File
     * @var File
     */
    private $file5;

    /**
     * @var string
     * @ORM\Column(name="path5", type="string", nullable=true)
     */
    protected $path5;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Match", mappedBy="luser")
     */
    protected $matches;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Messages", mappedBy="fromLuser")
     */
    protected $messagesFrom;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Messages", mappedBy="toLuser")
     */
    protected $messagesTo;

    /**
     * Return the file upload directory
     *
     * @return string
     */
    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/';
    }


    /**
     * @param string $email
     * @return Luser
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
     * @param string $password
     * @return Luser
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $description
     * @return Luser
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
     * @param boolean $disable
     * @return Luser
     */
    public function setDisable($disable)
    {
        $this->disable = $disable;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isDisable()
    {
        return $this->disable;
    }

    /**
     * @param File $file5
     * @return Luser
     */
    public function setFile5($file5)
    {
        if ( $file5 ) {
            $filename = sha1(uniqid(mt_rand(), true));
            $this->getUploadRootDir();

            // open the output file for writing
            $ifp = fopen(realpath($this->getUploadRootDir()) . $filename. '.jpg' , 'w+');

            // split the string on commas
            // $data[ 0 ] == "data:image/png;base64"
            // $data[ 1 ] == <actual base64 string>
            $data = explode(',', $file5);

            // we could add validation here with ensuring count( $data ) > 1
            fwrite($ifp, base64_decode($data[1]));

            // clean up the file resource
            fclose($ifp);

            $this->setPath5($this->getUploadRootDir() . $filename . '.jpg');
        }
        return $this;
    }

    /**
     * @return File
     */
    public function getFile5()
    {
        return $this->file5;
    }

    /**
     * @param string $path5
     * @return Luser
     */
    public function setPath5($path5)
    {
        $this->path5 = $path5;

        return $this;
    }

    /**
     * @return string
     */
    public function getPath5()
    {
        return $this->path5;
    }

    /**
     * @param string $path4
     * @return Luser
     */
    public function setPath4($path4)
    {
        $this->path4 = $path4;

        return $this;
    }

    /**
     * @return string
     */
    public function getPath4()
    {
        return $this->path4;
    }

    /**
     * @param File $file4
     * @return Luser
     */
    public function setFile4($file4)
    {
        if ( $file4 ) {
            $filename = sha1(uniqid(mt_rand(), true));
            $this->getUploadRootDir();

            // open the output file for writing
            $ifp = fopen(realpath($this->getUploadRootDir()) . $filename. '.jpg' , 'w+');

            // split the string on commas
            // $data[ 0 ] == "data:image/png;base64"
            // $data[ 1 ] == <actual base64 string>
            $data = explode(',', $file4);

            // we could add validation here with ensuring count( $data ) > 1
            fwrite($ifp, base64_decode($data[1]));

            // clean up the file resource
            fclose($ifp);

            $this->setPath4($this->getUploadRootDir() . $filename . '.jpg');
        }
        return $this;
    }

    /**
     * @return File
     */
    public function getFile4()
    {
        return $this->file4;
    }

    /**
     * @param string $path3
     * @return Luser
     */
    public function setPath3($path3)
    {
        $this->path3 = $path3;

        return $this;
    }

    /**
     * @return string
     */
    public function getPath3()
    {
        return $this->path3;
    }

    /**
     * @param File $file3
     * @return Luser
     */
    public function setFile3($file3)
    {
        if ( $file3 ) {
            $filename = sha1(uniqid(mt_rand(), true));
            $this->getUploadRootDir();

            // open the output file for writing
            $ifp = fopen(realpath($this->getUploadRootDir()) . $filename. '.jpg' , 'w+');

            // split the string on commas
            // $data[ 0 ] == "data:image/png;base64"
            // $data[ 1 ] == <actual base64 string>
            $data = explode(',', $file3);

            // we could add validation here with ensuring count( $data ) > 1
            fwrite($ifp, base64_decode($data[1]));

            // clean up the file resource
            fclose($ifp);

            $this->setPath3($this->getUploadRootDir() . $filename . '.jpg');
        }
        return $this;
    }

    /**
     * @return File
     */
    public function getFile3()
    {
        return $this->file3;
    }

    /**
     * @param string $path2
     * @return Luser
     */
    public function setPath2($path2)
    {
        $this->path2 = $path2;

        return $this;
    }

    /**
     * @return string
     */
    public function getPath2()
    {
        return $this->path2;
    }

    /**
     * @param File $file2
     * @return Luser
     */
    public function setFile2($file2)
    {
        if ( $file2 ) {
            $filename = sha1(uniqid(mt_rand(), true));
            $this->getUploadRootDir();

            // open the output file for writing
            $ifp = fopen(realpath($this->getUploadRootDir()) . $filename. '.jpg' , 'w+');

            // split the string on commas
            // $data[ 0 ] == "data:image/png;base64"
            // $data[ 1 ] == <actual base64 string>
            $data = explode(',', $file2);

            // we could add validation here with ensuring count( $data ) > 1
            fwrite($ifp, base64_decode($data[1]));

            // clean up the file resource
            fclose($ifp);

            $this->setPath2($this->getUploadRootDir() . $filename . '.jpg');
        }
        return $this;
    }

    /**
     * @return File
     */
    public function getFile2()
    {
        return $this->file2;
    }

    /**
     * @param string $path1
     * @return Luser
     */
    public function setPath1($path1)
    {
        $this->path1 = $path1;

        return $this;
    }

    /**
     * @return string
     */
    public function getPath1()
    {
        return $this->path1;
    }

    /**
     * @param File $file1
     * @return Luser
     */
    public function setFile1($file1)
    {
        if ( $file1 ) {
            $filename = sha1(uniqid(mt_rand(), true));
            $this->getUploadRootDir();

            // open the output file for writing
            $ifp = fopen(realpath($this->getUploadRootDir()) . $filename. '.jpg' , 'w+');

            // split the string on commas
            // $data[ 0 ] == "data:image/png;base64"
            // $data[ 1 ] == <actual base64 string>
            $data = explode(',', $file1);

            // we could add validation here with ensuring count( $data ) > 1
            fwrite($ifp, base64_decode($data[1]));

            // clean up the file resource
            fclose($ifp);

            $this->setPath1($this->getUploadRootDir() . $filename . '.jpg');
        }
        return $this;
    }

    /**
     * @return File
     */
    public function getFile1()
    {
        return $this->file1;
    }

    /**
     * @param string $name
     * @return Luser
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
     * @param int $rooms
     * @return Luser
     */
    public function setRooms($rooms)
    {
        $this->rooms = $rooms;

        return $this;
    }

    /**
     * @return int
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * @param mixed $beds
     * @return Luser
     */
    public function setBeds($beds)
    {
        $this->beds = $beds;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBeds()
    {
        return $this->beds;
    }

    public function __toString()
    {
        return $this->email;
    }

    /**
     * @param string $phoneNumber
     * @return Luser
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

    /**
     * @param string $town
     * @return Luser
     */
    public function setTown($town)
    {
        $this->town = $town;

        return $this;
    }

    /**
     * @return string
     */
    public function getTown()
    {
        return $this->town;
    }

}
