<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\ReferentielRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     denormalizationContext={"groups"={"referentielWrite"}},
 *     normalizationContext={"groups"={"referentielRead"}},
 *     routePrefix="/admin",
 *     collectionOperations={
 *     "get_Referentiel_GroupeCompetences"={
 *          "method"="GET",
 *          "path"="/referentiels",
 *         
 *     },
 *     "get_Referentiel_GroupeCompetences_Competence"={
 *          "method"="GET",
 *          "path"="/referentiels/groupe_competences",
 *          
 *     },
 * "addReferentiel"={
 *    "method"="POST",
 *    "path"="/referentiel/add",
 *   "controller"="App\Controller\ReferentielController::addReferentiel", 
 * },
 *     }
 * )
 * @ORM\Entity(repositoryClass=ReferentielRepository::class)
 */
class Referentiel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("referentielRead")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("referentielGroupeCompetenceRead")
     * @Groups("referentielRead")
     * @Groups("referentielWrite")
     */
    private $libelle;



    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("referentielGroupeCompetenceRead")
     * @Groups("referentielRead")
     * @Groups("referentielWrite")
     */
    private $critereDev;

    /**
     * @ORM\ManyToOne(targetEntity=Promo::class, inversedBy="referentiels")
     */
    private $promo;

    /**
     * @ApiSubresource()
     * @ORM\ManyToMany(targetEntity=GroupeCompetence::class, inversedBy="referentiels",cascade={"persist"})
     * @Groups("referentielGroupeCompetenceRead")
     * @Groups("referentielRead")
     * @Groups("referentielWrite")
     *
     */
    private $groupeCompetence;

    /**
     * @ORM\Column(type="blob", nullable=true)
     * @Groups("referentielRead")
     * @Groups("referentielWrite")
     */
    private $programme;

    /**
     * @ORM\Column(type="text")
     * @Groups("referentielRead")
     * @Groups("referentielWrite")
     */
    private $critereDad;

    /**
     * @ORM\Column(type="text")
     * @Groups("referentielRead")
     * @Groups("referentielWrite")
     */
    private $presentation;

    public function __construct()
    {
        $this->groupeCompetence = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }


    public function getCritereDev(): ?string
    {
        return $this->critereDev;
    }

    public function setCritereDev(string $critereDev): self
    {
        $this->critereDev = $critereDev;

        return $this;
    }

    public function getPromo(): ?Promo
    {
        return $this->promo;
    }

    public function setPromo(?Promo $promo): self
    {
        $this->promo = $promo;

        return $this;
    }

    /**
     * @return Collection|GroupeCompetence[]
     */
    public function getGroupeCompetence(): Collection
    {
        return $this->groupeCompetence;
    }

    public function addGroupeCompetence(GroupeCompetence $groupeCompetence): self
    {
        if (!$this->groupeCompetence->contains($groupeCompetence)) {
            $this->groupeCompetence[] = $groupeCompetence;
        }

        return $this;
    }

    public function removeGroupeCompetence(GroupeCompetence $groupeCompetence): self
    {
        $this->groupeCompetence->removeElement($groupeCompetence);

        return $this;
    }

    public function getProgramme()
    {
        if($this->programme)
        {
            $stream= stream_get_contents($this->programme);
            return  base64_encode ($stream) ;
        }

        return null;
    }

    public function setProgramme($programme): self
    {
        $this->programme = $programme;

        return $this;
    }

    public function getCritereDad(): ?string
    {
        return $this->critereDad;
    }

    public function setCritereDad(string $critereDad): self
    {
        $this->critereDad = $critereDad;

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(string $presentation): self
    {
        $this->presentation = $presentation;

        return $this;
    }


}
