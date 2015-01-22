<?php
/**
 * Created by PhpStorm.
 * User: andranik
 * Date: 11/23/14
 * Time: 6:54 PM
 */

namespace nxtcar\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Message
 * @package nxtcar\UserBundle\Entity
 *
 * @ORM\Entity(repositoryClass="nxtcar\UserBundle\Entity\Repository\MessageRepository")
 * @ORM\Table(name="message")
 */
class Message
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="outMessages")
     * @ORM\JoinColumn(name="from_user_id", referencedColumnName="id")
     */
    protected $from;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="inMessages")
     * @ORM\JoinColumn(name="to_user_id", referencedColumnName="id")
     */
    protected $to;

    /**
     * @ORM\ManyToOne(targetEntity="nxtcar\MainBundle\Entity\RideDate", inversedBy="messages")
     * @ORM\JoinColumn(name="rid_date_id", referencedColumnName="id")
     */
    protected $rideDate;

    /**
     * @ORM\ManyToOne(targetEntity="nxtcar\MainBundle\Entity\RideDate")
     * @ORM\JoinColumn(name="temp_rid_date_id", referencedColumnName="id")
     */
    protected $tempRideDate;

    /**
     * @ORM\Column(name="message", type="string", length=1000, nullable=false)
     */
    protected $message;

    /**
     * @ORM\Column(name="send_date", type="datetime", nullable=false)
     */
    protected $sendDate;

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
     * Set from
     *
     * @param \nxtcar\UserBundle\Entity\User $from
     * @return Message
     */
    public function setFrom(\nxtcar\UserBundle\Entity\User $from = null)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Get from
     *
     * @return \nxtcar\UserBundle\Entity\User 
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Set to
     *
     * @param \nxtcar\UserBundle\Entity\User $to
     * @return Message
     */
    public function setTo(\nxtcar\UserBundle\Entity\User $to = null)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Get to
     *
     * @return \nxtcar\UserBundle\Entity\User 
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Set rideDate
     *
     * @param \nxtcar\MainBundle\Entity\RideDate $rideDate
     * @return Message
     */
    public function setRideDate(\nxtcar\MainBundle\Entity\RideDate $rideDate = null)
    {
        $this->rideDate = $rideDate;

        return $this;
    }

    /**
     * Get rideDate
     *
     * @return \nxtcar\MainBundle\Entity\RideDate 
     */
    public function getRideDate()
    {
        return $this->rideDate;
    }

    /**
     * Set tempRideDate
     *
     * @param \nxtcar\MainBundle\Entity\RideDate $tempRideDate
     * @return Message
     */
    public function setTempRideDate(\nxtcar\MainBundle\Entity\RideDate $tempRideDate = null)
    {
        $this->tempRideDate = $tempRideDate;

        return $this;
    }

    /**
     * Get tempRideDate
     *
     * @return \nxtcar\MainBundle\Entity\RideDate 
     */
    public function getTempRideDate()
    {
        return $this->tempRideDate;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Message
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set sendDate
     *
     * @param \DateTime $sendDate
     * @return Message
     */
    public function setSendDate($sendDate)
    {
        $this->sendDate = $sendDate;

        return $this;
    }

    /**
     * Get sendDate
     *
     * @return \DateTime 
     */
    public function getSendDate()
    {
        return $this->sendDate;
    }
}
