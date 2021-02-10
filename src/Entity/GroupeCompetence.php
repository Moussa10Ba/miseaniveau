<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\GroupeCompetenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

// *        "security"="is_granted('ROLE_ADMIN' or is_granted('ROLE_CM') or is_granted('ROLE_Formateur'))",
 //         "security_message"="Acces Denied",


/**
 * @ApiResource(
 *     denormalizationContext={"groups"={"groupeCompetenceWrite"}},
 *     normalizationContext={"groups"={"groupeCompetenceRead"}},
 *     routePrefix="/admin",
 *     attributes={
 *          "pagination_items_per_page"=10,
 *     },
 * collectionOperations={
 *    "get",
 *   "saveGroupeCompetence"={
 *   "method"="POST",
 *   "path"="/groupe_competences",
 *   "controller"="App/Controller/GroupeCompetenceController::saveGroupeCompetence",
 * },
 * },
 *  itemOperations={
 *     "get", "delete",
 *     "updateGroupeCompetence"={
 *          "method"="PUT",
 *          "path"="/groupe_competences/{id}",
 *          "controller"="App/Controller/GroupeCompetenceController::updateGroupeCompetence",
 *     },
 *
 *     },
 *
 * )
 * @ORM\Entity(repositoryClass=GroupeCompetenceRepository::class)
 * @UniqueEntity(
 *     fields={"libelle"},
 *     message="Cette competence existe deja",
 * )
 */
class GroupeCompetence
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("referentielGroupeCompetenceRead")
     * @Groups("referentielGroupeCompetenceCompetenceRead")
     * @Groups("referentielGroupeCompetenceWrite")
     * @Groups("groupeCompetenceRead")
     */
    private $id;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     * @Groups("referentielGroupeCompetenceRead")
     * @Groups("referentielGroupeCompetenceCompetenceRead")
     * @Groups("referentielGroupeCompetenceWrite")
     * @Groups("groupeCompetenceRead")
     * @Groups("groupeCompetenceWrite")
     */
    private $libelle;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=255)
     * @Groups("referentielGroupeCompetenceRead")
     * @Groups("referentielGroupeCompetenceCompetenceRead")
     * @Groups("referentielGroupeCompetenceWrite")
     * @Groups("groupeCompetenceRead")
     * @Groups("groupeCompetenceWrite")
     */
    private $descriptif;

    /**
     * @ApiSubresource()
     * @ORM\ManyToMany(targetEntity=Competence::class, inversedBy="groupeCompetences")
     * @Groups("referentielGroupeCompetenceCompetenceRead")
     * @Groups("groupeCompetenceRead")
     * @Groups("groupeCompetenceWrite")
     */
    private $competences;

    /**
     * @ORM\ManyToMany(targetEntity=Referentiel::class, mappedBy="groupeCompetence")
     */
    private $referentiels;

    public function __construct()
    {
        $this->competences = new ArrayCollection();
        $this->referentiels = new ArrayCollection();
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

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(string $descriptif): self
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    /**
     * @return Collection|Competence[]
     */
    public function getCompetences(): Collection
    {
        return $this->competences;
    }

    public function addCompetence(Competence $competence): self
    {
        if (!$this->competences->contains($competence)) {
            $this->competences[] = $competence;
        }

        return $this;
    }

    public function removeCompetence(Competence $competence): self
    {
        $this->competences->removeElement($competence);

        return $this;
    }

    /**
     * @return Collection|Referentiel[]
     */
    public function getReferentiels(): Collection
    {
        return $this->referentiels;
    }

    public function addReferentiel(Referentiel $referentiel): self
    {
        if (!$this->referentiels->contains($referentiel)) {
            $this->referentiels[] = $referentiel;
            $referentiel->addGroupeCompetence($this);
        }

        return $this;
    }

    public function removeReferentiel(Referentiel $referentiel): self
    {
        if ($this->referentiels->removeElement($referentiel)) {
            $referentiel->removeGroupeCompetence($this);
        }

        return $this;
    }

}
