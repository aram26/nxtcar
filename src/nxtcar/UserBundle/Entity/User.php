<?php

/**
 * This file is part of the <name> project.
 *
 * (c) <yourname> <youremail>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace nxtcar\UserBundle\Entity;

use Sonata\UserBundle\Entity\BaseUser as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @package nxtcar\UserBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="year_of_birth", type="integer", nullable=true)
     */
    protected $yearOfBirth;

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getYearOfBirth()
    {
        return $this->yearOfBirth;
    }

    /**
     * @param $year
     * @return $this
     */
    public function setYearOfBirth($year)
    {
        $this->yearOfBirth = $year;

        return $this;
    }
}