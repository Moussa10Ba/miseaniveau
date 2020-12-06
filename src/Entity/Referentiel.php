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
 *     routePrefix="/admin",
 *     collectionOperations={
 *     "get_Referentiel_GroupeCompetences"={
 *          "method"="GET",
 *          "path"="/referentiels",
 *          "normalization_context"={"groups"={"referentielGroupeCompetenceRead"}},
 *     },
 *     "get_Referentiel_GroupeCompetences_Competence"={
 *          "method"="GET",
 *          "path"="/referentiels/groupe_competences",
 *          "normalization_context"={"groups"={"referentielGroupeCompetenceCompetenceRead"}},
 *     },
 *     "add_Referentiel"={
 *      "method"="POST",
 *      "path"="/referentiels",
 *      "denormalization_context"={"groups"={"referentielGroupeCompetenceWrite"}},
 *     }
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
     * @Groups("referentielGroupeCompetenceRead")
     * @Groups("referentielGroupeCompetenceCompetenceRead")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("referentielGroupeCompetenceRead")
     * @Groups("referentielGroupeCompetenceCompetenceRead")
     * @Groups("referentielGroupeCompetenceWrite")
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("referentielGroupeCompetenceRead")
     * @Groups("referentielGroupeCompetenceCompetenceRead")
     * @Groups("referentielGroupeCompetenceWrite")
     */
    private $programme;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("referentielGroupeCompetenceRead")
     * @Groups("referentielGroupeCompetenceCompetenceRead")
     * @Groups("referentielGroupeCompetenceWrite")
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
     * @Groups("referentielGroupeCompetenceCompetenceRead")
     * @Groups("referentielGroupeCompetenceWrite")
     *
     */
    private $groupeCompetence;

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

    public function getProgramme(): ?string
    {
        return $this->programme;
    }

    public function setProgramme(string $programme): self
    {
        $this->programme = $programme;

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


}
