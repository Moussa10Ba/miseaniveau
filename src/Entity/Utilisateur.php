<?php

namespace App\Entity;

use App\Entity\Profil;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UtilisateurRepository;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use ApiPlatform\Core\Annotation\ApiProperty;

// * "security"="is_granted('ROLE_ADMIN')",
//  * "security_message"="Vous n'avez pas acces à cette ressource",

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 * @UniqueEntity("email")
 * @ApiResource(
 * denormalizationContext={"groups"={"userWrite"}},
 * normalizationContext={"groups"={"userRead"}},
 * routePrefix="/admin",
 * attributes={
 * "pagination_items_per_page"=10,
 * },
 * itemOperations={
 * "get", "delete",
 *  "updateUser"=
 *     {
 * "method"="PUT",
 * "security"="is_granted('ROLE_ADMIN')",
 * "security_message"="Vous n'avez pas acces à cette ressource",
 *
 *     },
 *
 * },
 * collectionOperations = {
 *  "addUtilisateur"={
 *    "method"="POST",
 *    "path"="/utilisateurs/add",
 *   "controller"="App\Controller\UtilisateurController::addUser",
 * 
 * },
 *  "get"
 * }
 * )
 * @ORM\InheritanceType("JOINED")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"user" = "Utilisateur", "apprenant" = "Apprenant", "admin"="Administrateur", "formateur"="Formateur","cm"="CM"})
 */
class Utilisateur implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("userRead");
     * @Groups("getApprenantGroupePrincipalRead")
     */
    protected $id;


    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Groups({"userRead","userWrite"})
     * @Groups("getApprenantGroupePrincipalRead")
     */
    protected $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Groups({"userRead","userWrite"})
     * @Groups("getApprenantGroupePrincipalRead")
     */
    protected $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"userRead","userWrite"})
     * @Assert\NotBlank
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email."
     * )
     * @Groups("getApprenantGroupePrincipalRead")
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Groups({"userWrite"})
     */
     
    protected $password;

    protected $roles = [];

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Groups({"userRead","userWrite"})
     */
    protected $login;

    /**
     * @ORM\ManyToOne(targetEntity=Profil::class, inversedBy="utilisateurs")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"userRead", "userWrite"});
     *  @ApiProperty (readableLink = false, writableLink = false):
     */
    protected $profil;

    /**
     * @ORM\Column(type="blob", nullable=true)
     * @Groups({"userRead","userWrite"})
     */
    protected $photo;

    protected $plainPassword;

    /**
     * @return mixed
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param mixed $plainPassword
     */
    public function setPlainPassword($plainPassword): void
    {
        $this->plainPassword = $plainPassword;
    }

    /**
     * @ORM\Column(type="boolean")
     *
     */
    protected $archive=false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
    
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }


    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->login;
    }

    public function setUsername(string $username): self
    {
        $this->login = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_'.$this->profil->getLibelle();

        return array_unique($roles);
    }


    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getProfil(): ?Profil
    {
        return $this->profil;
    }

    public function setProfil(?Profil $profil): self
    {
        $this->profil = $profil;

        return $this;
    }

    public function getPhoto()
    {
        if($this->photo)
        {
            $stream= stream_get_contents($this->photo);
            return  base64_encode ($stream) ;
        }

        return null;
    }

    public function setPhoto($photo): self
    {
        $this->photo = $photo;

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

}
