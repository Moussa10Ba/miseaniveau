<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProfilSortieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ProfilSortieRepository::class)
 * @ApiResource(
 *     normalizationContext={"groups"={"profilSortieRead"}},
 *     denormalizationContext={"groups"={"profiSortielWrite"}},
 *    routePrefix="admin",
 *  collectionOperations={
 *      "post"={
 *          "security"="(is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur'))",
 *          "security_message"="Acces Denied",
 *             },
 *       "get"={
 *          "security"="(is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur') or is_granted('ROLE_CM'))",
 *          "security_message"="Acces Denied",
 *          },
 *     },
 *   itemOperations={
 *          "put"={
 *          "security"="(is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur'))",
 *          "security_message"="Acces Denied",
 *            },
 *          "get"={
 *          "security"="(is_granted('ROLE_ADMIN') or is_granted('ROLE_CM') or is_granted('ROLE_Formateur'))",
 *          "security_message"="Acces Denied",
 *          },
 *          "put"={
 *          "security"="(is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur'))",
 *          "security_message"="Acces Denied",
 * }
 *     },
 *
 * )
 */
class ProfilSortie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"profilSortieRead","apprenantsRead","userRead"})
     */
    private $libelleProfilSortie;

    /**
     * @ORM\OneToMany(targetEntity=Apprenant::class, mappedBy="profilSortie")
     */
    private $apprenants;

    public function __construct()
    {
        $this->apprenants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleProfilSortie(): ?string
    {
        return $this->libelleProfilSortie;
    }

    public function setLibelleProfilSortie(string $libelleProfilSortie): self
    {
        $this->libelleProfilSortie = $libelleProfilSortie;

        return $this;
    }

    /**
     * @return Collection|Apprenant[]
     */
    public function getApprenants(): Collection
    {
        return $this->apprenants;
    }

    public function addApprenant(Apprenant $apprenant): self
    {
        if (!$this->apprenants->contains($apprenant)) {
            $this->apprenants[] = $apprenant;
            $apprenant->setProfilSortie($this);
        }

        return $this;
    }

    public function removeApprenant(Apprenant $apprenant): self
    {
        if ($this->apprenants->removeElement($apprenant)) {
            // set the owning side to null (unless already changed)
            if ($apprenant->getProfilSortie() === $this) {
                $apprenant->setProfilSortie(null);
            }
        }

        return $this;
    }
}
