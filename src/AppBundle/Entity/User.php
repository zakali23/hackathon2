<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="`user`")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User
{

    /*
     * Adding Personal methods/variables
     */


    public function __toString()
    {
        // Return the User object with "[IACO] - [NAME] [CITY]" format, when  __toString is called.
        return $this->firstName;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;




}
