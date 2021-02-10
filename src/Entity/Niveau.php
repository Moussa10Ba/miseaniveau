<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NiveauRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=NiveauRepository::class)
 * @ApiResource(
 *   denormalizationContext={"groups"={"niveauWrite"}},
 *   normalizationContext={"groups"={"niveauRead"}},
 *  attributes={
 *     "pagination_items_per_page"=3,
 *     },
 * )
 */
class Niveau
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"niveauRead","niveauWrite","competenceRead","competenceWrite"})
     */
    private $critereDeval;

    /**
     * @ORM\ManyToOne(targetEntity=Competence::class, inversedBy="niveau")
     */
    private $competence;

    /**
     * @ORM\Column(type="text")
     * @Groups({"niveauRead","niveauWrite","competenceRead","competenceWrite"})
     */
    private $groupeDaction;


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getCritereDeval(): ?string
    {
        return $this->critereDeval;
    }

    public function setCritereDeval(string $critereDeval): self
    {
        $this->critereDeval = $critereDeval;

        return $this;
    }

    public function getCompetence(): ?Competence
    {
        return $this->competence;
    }

    public function setCompetence(?Competence $competence): self
    {
        $this->competence = $competence;

        return $this;
    }

    public function getGroupeDaction(): ?string
    {
        return $this->groupeDaction;
    }

    public function setGroupeDaction(string $groupeDaction): self
    {
        $this->groupeDaction = $groupeDaction;

        return $this;
    }


}
