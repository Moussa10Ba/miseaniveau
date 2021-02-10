<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProfilRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=ProfilRepository::class)
 * @UniqueEntity("libelle")
 * @ApiFilter(BooleanFilter::class, properties={"archive"})
 * @ApiResource(
 *  denormalizationContext={"groups"={"profilWrite"}},
 *  normalizationContext={"groups"={"profilRead"}},
 * routePrefix="/admin",
 *  attributes={
 *      "pagination_items_per_page"=10,
 *      "security"="is_granted('ROLE_ADMIN')",
 *      "security_message"="Vous n'avez pas acces à cette ressource"
 * },
 *  itemOperations={
 *  "get","put","delete",
 * },
 * collectionOperations={
 *  "get","post",
 * },
 * )
 */
class Profil
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("profilRead")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank;
     * @Groups({"profilRead","profilWrite", "userWrite"})
     */
    private $libelle;

    /**
     * @ORM\Column(type="boolean")
     * @Groups("profilRead")
     * @Groups("profilWrite")
     */
    private $archive;

    /**
     * @ApiSubresource()
     * @ORM\OneToMany(targetEntity=Utilisateur::class, mappedBy="profil")
     */
    private $utilisateurs;

    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
        $this->setArchive(false);
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
     * @return Collection|Utilisateur[]
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $utilisateur): self
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs[] = $utilisateur;
            $utilisateur->setProfil($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        if ($this->utilisateurs->removeElement($utilisateur)) {
            // set the owning side to null (unless already changed)
            if ($utilisateur->getProfil() === $this) {
                $utilisateur->setProfil(null);
            }
        }

        return $this;
    }

    
}
