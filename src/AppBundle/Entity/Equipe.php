<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipe
 *
 *
 * @ORM\Table(name="equipe")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EquipeRepository")
 */
class Equipe
{

    /**
     * @return string
     */
    public function __toString()
    {
        // Return the Site object with "[IDEQUIPE]" format, when  __toString is called.
        return $this->nomEquipe;
    }

    /**
     * @var int
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Joueur", mappedBy="idEquipe")
     */
    private $idEquipes;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="nomEquipe", type="string", length=255)
     */
    private $nomEquipe;

    /**
     * @var string
     *
     * @ORM\Column(name="drapeau", type="text", nullable=true)
     */
    private $drapeau;


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
     * Set nomEquipe
     *
     * @param string $nomEquipe
     *
     * @return Equipe
     */
    public function setNomEquipe($nomEquipe)
    {
        $this->nomEquipe = $nomEquipe;

        return $this;
    }

    /**
     * Get nomEquipe
     *
     * @return string
     */
    public function getNomEquipe()
    {
        return $this->nomEquipe;
    }

    /**
     * Set drapeau
     *
     * @param string $drapeau
     *
     * @return Equipe
     */
    public function setDrapeau($drapeau)
    {
        $this->drapeau = $drapeau;

        return $this;
    }

    /**
     * Get drapeau
     *
     * @return string
     */
    public function getDrapeau()
    {
        return $this->drapeau;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idEquipes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add idEquipe.
     *
     * @param \AppBundle\Entity\Joueur $idEquipe
     *
     * @return Equipe
     */
    public function addIdEquipe(\AppBundle\Entity\Joueur $idEquipe)
    {
        $this->idEquipes[] = $idEquipe;

        return $this;
    }

    /**
     * Remove idEquipe.
     *
     * @param \AppBundle\Entity\Joueur $idEquipe
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeIdEquipe(\AppBundle\Entity\Joueur $idEquipe)
    {
        return $this->idEquipes->removeElement($idEquipe);
    }

    /**
     * Get idEquipes.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdEquipes()
    {
        return $this->idEquipes;
    }
}
