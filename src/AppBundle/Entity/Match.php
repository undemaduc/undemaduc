<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Match
 * @package AppBundle\Entity
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MatchRepository")
 * @ORM\Table("match_making")
 */
class Match
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var bool
     * @ORM\Column(name="l_to_u", type="boolean", nullable=true)
     */
    protected $l_to_u;

    /**
     * @var bool
     * @ORM\Column(name="u_to_l", type="boolean", nullable=true)
     */
    protected $u_to_l;

    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="User", inversedBy="matches")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="Luser", inversedBy="matches")
     * @ORM\JoinColumn(name="luser_id", referencedColumnName="id")
     */
    protected $luser;

    /**
     * @param boolean $u_to_l
     * @return Match
     */
    public function setUToL($u_to_l)
    {
        $this->u_to_l = $u_to_l;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isUToL()
    {
        return $this->u_to_l;
    }

    /**
     * @param boolean $l_to_u
     * @return Match
     */
    public function setLToU($l_to_u)
    {
        $this->l_to_u = $l_to_u;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isLToU()
    {
        return $this->l_to_u;
    }

    /**
     * @param int $user
     * @return Match
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return int
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param int $luser
     * @return Match
     */
    public function setLuser($luser)
    {
        $this->luser = $luser;

        return $this;
    }

    /**
     * @return int
     */
    public function getLuser()
    {
        return $this->luser;
    }


}