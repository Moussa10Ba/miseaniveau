<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FormateurRepository;
use Doctrine\ORM\Mapping as ORM;

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
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $specialite;

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
}
