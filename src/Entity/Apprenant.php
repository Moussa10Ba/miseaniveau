<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Entity\Utilisateur;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ApprenantRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ApprenantRepository::class)
 * @ApiResource(
 *  normalizationContext={"groups"={"apprenantsRead,userRead"}},
 *  denormalizationContext={"groups"={"apprenantsWrite","userWrite"}},
 * itemOperations={
 * "updateApprenant"={
 *   "security"="is_granted('EDIT', object)",
 *   "security_message"="Acces Denied",
 *   "method"="PUT",
 *   "path"="apprennants/{id}",
 *   "controller"="App\Controller\UtilisateurController::updateUser",
 *     },
 * "get"={
 *     "security"="is_granted('VIEW',object)",
 *     "security_message"="Acces Denied",
 *     },
 *     },
 * collectionOperations={
 * "get"={
 *  "security"="(is_granted('ROLE_ADMIN') or is_granted('ROLE_CM') or is_granted('ROLE_Formateur'))",
 *  "security_message"="Acces Denied",
 *     },
 *     "addApprennant"={
 *      "security"="(is_granted('ROLE_ADMIN') or is_granted('ROLE_CM') or is_granted('ROLE_Formateur'))",
 *      "security_message"="Acces Denied",
 *      "method"="POST",
 *      "path"="/apprenants",
 *      "controller"="App\Controller\UtilisateurController::AddApprenant",
 *     },
 *    },
 * )
 */
class Apprenant extends Utilisateur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("add_promo_apprenantWrite")
     * @Groups("get_promo_ref_formaRead")
     * @Groups("getApprenantGroupePrincipalRead")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"apprenantsWrite","userWrite"})
     * @Groups("add_promo_apprenantWrite")
     * @Groups("add_promo_apprenantWrite")
     * @Groups("get_promo_ref_formaRead")
     * @Groups("getApprenantGroupePrincipalRead")
     */
    protected $status;

    /**
     * @ORM\ManyToOne(targetEntity=ProfilSortie::class, inversedBy="apprenants")
     */
    private $profilSortie;

    /**
     * @ORM\ManyToOne(targetEntity=Promo::class, inversedBy="apprennants")
     */
    private $promo;

    /**
     * @ORM\ManyToOne(targetEntity=GroupePromo::class, inversedBy="apprenant")
     */
    private $groupePromo;

    /**
     * @ORM\OneToMany(targetEntity=CompetenceValides::class, mappedBy="apprenant")
     */
    private $competenceValides;

    public function __construct()
    {
        $this->competenceValides = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getProfilSortie(): ?ProfilSortie
    {
        return $this->profilSortie;
    }

    public function setProfilSortie(?ProfilSortie $profilSortie): self
    {
        $this->profilSortie = $profilSortie;

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

    public function getGroupePromo(): ?GroupePromo
    {
        return $this->groupePromo;
    }

    public function setGroupePromo(?GroupePromo $groupePromo): self
    {
        $this->groupePromo = $groupePromo;

        return $this;
    }

    /**
     * @return Collection|CompetenceValides[]
     */
    public function getCompetenceValides(): Collection
    {
        return $this->competenceValides;
    }

    public function addCompetenceValide(CompetenceValides $competenceValide): self
    {
        if (!$this->competenceValides->contains($competenceValide)) {
            $this->competenceValides[] = $competenceValide;
            $competenceValide->setApprenant($this);
        }

        return $this;
    }

    public function removeCompetenceValide(CompetenceValides $competenceValide): self
    {
        if ($this->competenceValides->removeElement($competenceValide)) {
            // set the owning side to null (unless already changed)
            if ($competenceValide->getApprenant() === $this) {
                $competenceValide->setApprenant(null);
            }
        }

        return $this;
    }
}
