<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\CompetenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CompetenceRepository::class)
 * @UniqueEntity(
 *     fields={"libelle"},
 *     message="Cette competence existe deja",
 * )
 * @ApiResource(
 *     denormalizationContext={"groups"={"competenceWrite"}},
 *     normalizationContext={"groups"={"competenceRead"}},
 *     attributes={
 *      "pagination_items_per_page"=15,
 *     },
 *     routePrefix="/admin",
 *     collectionOperations={
 *      "get"={
 *      "security"="(is_granted('ROLE_ADMIN') or is_granted('ROLE_CM') or is_granted('ROLE_Formateur'))",
 *     "seccurity_message"="Acces Denied",
 *     },
 *     "addCompetence"={
 *      "security"="(is_granted('ROLE_ADMIN'))",
 *      "Security_message"="Seul un admin peut ajouter des comptetences",
 *      "method"="POST",
 *      "path"="/competences",
 *      "controller"="App/Controller/CompetenceController::addCompetence",
 *     },
 *     },
 *     itemOperations={
 *     "get"={
 *      "security"="(is_granted('ROLE_ADMIN) or is_granted('ROLE_CM') or is_grated('ROLE_Formateur'))",
 *     "seccurity_message"="Acces Denied",
 *     },
 *     "updateCompetencee"={
 *     "security"="(is_granted('ROLE_ADMIN'))",
 *     "method"="PUT",
 *     "Security_message"="Seul un admin peut Modifier des comptetences",
 *     "path"="/competences/{id}",
 *     "controller"="App/Controller/CompetenceController::updateCompetence",
 *     },
 *     },
 * )
 */
class Competence
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"competenceRead","competenceWrite"})
     * @Groups("referentielGroupeCompetenceCompetenceRead")

     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"competenceRead","groupeCompetenceRead"})
     * @Groups({"competenceRead","competenceWrite"})
     * @Groups("referentielGroupeCompetenceCompetenceRead")
     * @Groups("groupeCompetenceRead")
     * @Groups("groupeCompetenceWrite")
     */
    private $libelle;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"competenceRead","groupeCompetenceRead","competenceWrite"})
     * @Groups("referentielGroupeCompetenceCompetenceRead")
     * @Groups("groupeCompetenceRead")
     * @Groups("groupeCompetenceWrite")
     */
    private $archive;

    /**
     * @ORM\ManyToMany(targetEntity=GroupeCompetence::class, mappedBy="competences")
     */
    private $groupeCompetences;

    /**
     * @ApiSubresource()
     * @ORM\OneToMany(targetEntity=Niveau::class, mappedBy="competence")
     * @Groups({"competenceRead","competenceWrite"})
     */
    private $niveau;

    /**
     * @ORM\ManyToOne(targetEntity=CompetenceValides::class, inversedBy="competence")
     */
    private $competenceValides;


    public function __construct()
    {
        $this->groupeCompetences = new ArrayCollection();
        $this->niveau = new ArrayCollection();
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


    public function getArchive(): ?bool
    {
        return $this->archive;
    }

    public function setArchive(bool $archive): self
    {
        $this->archive = $archive;

        return $this;
    }

    /**
     * @return Collection|GroupeCompetence[]
     */
    public function getGroupeCompetences(): Collection
    {
        return $this->groupeCompetences;
    }

    public function addGroupeCompetence(GroupeCompetence $groupeCompetence): self
    {
        if (!$this->groupeCompetences->contains($groupeCompetence)) {
            $this->groupeCompetences[] = $groupeCompetence;
            $groupeCompetence->addCompetence($this);
        }

        return $this;
    }

    public function removeGroupeCompetence(GroupeCompetence $groupeCompetence): self
    {
        if ($this->groupeCompetences->removeElement($groupeCompetence)) {
            $groupeCompetence->removeCompetence($this);
        }

        return $this;
    }

    /**
     * @return Collection|Niveau[]
     */
    public function getNiveau(): Collection
    {
        return $this->niveau;
    }

    public function addNiveau(Niveau $niveau): self
    {
        if (!$this->niveau->contains($niveau)) {
            $this->niveau[] = $niveau;
            $niveau->setCompetence($this);
        }

        return $this;
    }

    public function removeNiveau(Niveau $niveau): self
    {
        if ($this->niveau->removeElement($niveau)) {
            // set the owning side to null (unless already changed)
            if ($niveau->getCompetence() === $this) {
                $niveau->setCompetence(null);
            }
        }

        return $this;
    }

    public function getCompetenceValides(): ?CompetenceValides
    {
        return $this->competenceValides;
    }

    public function setCompetenceValides(?CompetenceValides $competenceValides): self
    {
        $this->competenceValides = $competenceValides;

        return $this;
    }


}
