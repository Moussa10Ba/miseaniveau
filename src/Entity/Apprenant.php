<?php

namespace App\Entity;

use App\Entity\Utilisateur;
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
 *   "path"="api/apprennants/{id}",
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
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"apprenantsWrite","userWrite"})
     */
    protected $status;

    /**
     * @ORM\ManyToOne(targetEntity=ProfilSortie::class, inversedBy="apprenants")
     */
    private $profilSortie;

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
}
