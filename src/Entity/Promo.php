<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\PromoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=PromoRepository::class)
 * @ApiResource(
 *    denormalizationContext={"groups"={"promoWrite"}},
 *    normalizationContext={"groups"={"promoRead"}},
 *     attributes={
 *     "security"="(is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur') or is_granted('ROLE_CM'))",
 *      "security_message"="Acces Denied",
 *     },
 *     routePrefix="/admin",
 *     attributes={
 *      "pagination_items_per_page"=10,
 *     },
 *     collectionOperations={
 *    "get_promo_ref_forma"={
 *     "method"="GET",
 *     "path"="/promo",
 *     "normalization_context"={"groups"={"get_promo_ref_formaRead"}},
 *     },
 *     "get_promo_ref_formaApp"={
 *     "method"="GET",
 *     "path"="/promo/apprenants/attente",
 *     "normalization_context"={"groups"={"get_promo_ref_formaRead"}},
 *     },
 *     "getApprenantGroupePrincipal"={
 *             "method"="GET",
 *             "path"="/promo/apprenants/principal",
 *             "normalization_context"={"groups"={"getApprenantGroupePrincipalRead"}},
 *     },
 *     }
 * )
 */
class Promo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("get_promo_ref_formaRead")
     * @Groups("getApprenantGroupePrincipalRead")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("get_promo_ref_formaRead")
     * @Groups("add_promo_apprenantWrite")
     * @Groups("getApprenantGroupePrincipalRead")
     * @Groups("promoRead")
     */
    private $lieu;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("get_promo_ref_formaRead")
     * @Groups("add_promo_apprenantWrite")
     * @Groups("getApprenantGroupePrincipalRead")
     * @Groups("promoRead")
     */
    private $referenceAgate;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("get_promo_ref_formaRead")
     * @Groups("add_promo_apprenantWrite")
     * @Groups("getApprenantGroupePrincipalRead")
     * @Groups("promoRead")
     */
    private $langue;

    /**
     * @ORM\Column(type="date")
     * @Groups("get_promo_ref_formaRead")
     * @Groups("add_promo_apprenantWrite")
     * @Groups("getApprenantGroupePrincipalRead")
     * @Groups("promoRead")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="date")
     * @Groups("get_promo_ref_formaRead")
     * @Groups("add_promo_apprenantWrite")
     * @Groups("getApprenantGroupePrincipalRead")
     * @Groups("promoRead")
     */
    private $dateFin;

    /**
     * @ORM\OneToMany(targetEntity=Apprenant::class, mappedBy="promo",cascade={"persist"})
     * @Groups("add_promo_apprenantWrite")
     * @Groups("get_promo_ref_formaRead")
     * @Groups("getApprenantGroupePrincipalRead")
     *
     */
    private $apprennants;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("get_promo_ref_formaRead")
     * @Groups("promoRead")
     */
    private $titre;

    /**
     * @ORM\Column(type="blob", nullable=true)
     * @Groups("promoRead")
     */
    private $avatar;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("get_promo_ref_formaRead")
     * @Groups("promoRead")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=ProfilSortie::class, inversedBy="promos")
     */
    private $profilsorties;

    /**
     * @ORM\OneToMany(targetEntity=GroupePromo::class, mappedBy="promo")
     * @ApiSubresource()
     * @Groups("get_promo_ref_formaRead")
     */
    private $groupePromos;

    /**
     * @ORM\OneToMany(targetEntity=Referentiel::class, mappedBy="promo",cascade={"persist"})
     * @ApiSubresource()
     * @Groups("get_promo_ref_formaRead")
     */
    private $referentiels;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type="Open";

    /**
     * @ORM\ManyToMany(targetEntity=Formateur::class, inversedBy="promos")
     * @ApiSubresource()
     * @Groups("get_promo_ref_formaRead")
     * @Groups("getApprenantGroupePrincipalRead")
     */
    private $formateurs;





    public function __construct()
    {
        $this->apprennants = new ArrayCollection();
        $this->profilsorties = new ArrayCollection();
        $this->formateur = new ArrayCollection();
        $this->groupePromos = new ArrayCollection();
        $this->referentiels = new ArrayCollection();
        $this->formateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getReferenceAgate(): ?string
    {
        return $this->referenceAgate;
    }

    public function setReferenceAgate(string $referenceAgate): self
    {
        $this->referenceAgate = $referenceAgate;

        return $this;
    }

    public function getLangue(): ?string
    {
        return $this->langue;
    }

    public function setLangue(string $langue): self
    {
        $this->langue = $langue;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * @return Collection|Apprenant[]
     */
    public function getApprennants(): Collection
    {
        return $this->apprennants;
    }

    public function addApprennant(Apprenant $apprennant): self
    {
        if (!$this->apprennants->contains($apprennant)) {
            $this->apprennants[] = $apprennant;
            $apprennant->setPromo($this);
        }

        return $this;
    }

    public function removeApprennant(Apprenant $apprennant): self
    {
        if ($this->apprennants->removeElement($apprennant)) {
            // set the owning side to null (unless already changed)
            if ($apprennant->getPromo() === $this) {
                $apprennant->setPromo(null);
            }
        }

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getAvatar()
    {
        if($this->avatar)
        {
            $stream= stream_get_contents($this->avatar);
            return  base64_encode ($stream) ;
        }

        return null;
    }

    public function setAvatar($avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|ProfilSortie[]
     */
    public function getProfilsorties(): Collection
    {
        return $this->profilsorties;
    }

    public function addProfilsorty(ProfilSortie $profilsorty): self
    {
        if (!$this->profilsorties->contains($profilsorty)) {
            $this->profilsorties[] = $profilsorty;
        }

        return $this;
    }

    public function removeProfilsorty(ProfilSortie $profilsorty): self
    {
        $this->profilsorties->removeElement($profilsorty);

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
            $groupePromo->setPromo($this);
        }

        return $this;
    }

    public function removeGroupePromo(GroupePromo $groupePromo): self
    {
        if ($this->groupePromos->removeElement($groupePromo)) {
            // set the owning side to null (unless already changed)
            if ($groupePromo->getPromo() === $this) {
                $groupePromo->setPromo(null);
            }
        }

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
            $referentiel->setPromo($this);
        }

        return $this;
    }

    public function removeReferentiel(Referentiel $referentiel): self
    {
        if ($this->referentiels->removeElement($referentiel)) {
            // set the owning side to null (unless already changed)
            if ($referentiel->getPromo() === $this) {
                $referentiel->setPromo(null);
            }
        }

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|Formateur[]
     */
    public function getFormateurs(): Collection
    {
        return $this->formateurs;
    }

    public function addFormateur(Formateur $formateur): self
    {
        if (!$this->formateurs->contains($formateur)) {
            $this->formateurs[] = $formateur;
        }

        return $this;
    }

    public function removeFormateur(Formateur $formateur): self
    {
        $this->formateurs->removeElement($formateur);

        return $this;
    }





}
