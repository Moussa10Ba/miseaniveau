<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FormateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=FormateurRepository::class)
 * @ApiResource(
 *     collectionOperations={
 * "get"={
 *      "security"="is_granted('VIEW', object)",
 *      "security_message"="Acces Denied",
 *     },
 *     "AddFormateur"={
 *     "security"="is_granted('ROLE_ADMIN')",
 *     "security_message"="Acces Denied",
 *     "method"="POST",
 *      "controller":"App\Controller\Utilisateur::addFormateur",
 *     },
 *  },
 *     itemOperations={
 * "get","put","delete"
 * },
 * )
 */
class Formateur extends  Utilisateur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("get_promo_ref_formaRead")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("get_promo_ref_formaRead")
     * @Groups("getApprenantGroupePrincipalRead")
     *
     */
    protected $specialite;

    /**
     * @ORM\ManyToMany(targetEntity=GroupePromo::class, mappedBy="formateur")
     * @Groups("getApprenantGroupePrincipalRead")
     */
    private $groupePromos;

    /**
     * @ORM\ManyToMany(targetEntity=Promo::class, mappedBy="formateurs")
     */
    private $promos;

    public function __construct()
    {
        $this->groupePromos = new ArrayCollection();
        $this->promos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(?string $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }

    /**
     * @return Collection|GroupePromo[]
     */
    public function getGroupePromos(): Collection
    {
        return $this->groupePromos;
    }

    public function addGroupePromo(GroupePromo $groupePromo): self
    {
        if (!$this->groupePromos->contains($groupePromo)) {
            $this->groupePromos[] = $groupePromo;
            $groupePromo->addFormateur($this);
        }

        return $this;
    }

    public function removeGroupePromo(GroupePromo $groupePromo): self
    {
        if ($this->groupePromos->removeElement($groupePromo)) {
            $groupePromo->removeFormateur($this);
        }

        return $this;
    }

    /**
     * @return Collection|Promo[]
     */
    public function getPromos(): Collection
    {
        return $this->promos;
    }

    public function addPromo(Promo $promo): self
    {
        if (!$this->promos->contains($promo)) {
            $this->promos[] = $promo;
            $promo->addFormateur($this);
        }

        return $this;
    }

    public function removePromo(Promo $promo): self
    {
        if ($this->promos->removeElement($promo)) {
            $promo->removeFormateur($this);
        }

        return $this;
    }
}
