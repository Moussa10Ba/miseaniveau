<?php

namespace App\Entity;

use App\Entity\Utilisateur;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AdministrateurRepository;

/**
 * @ORM\Entity(repositoryClass=AdministrateurRepository::class)
* @ApiResource()
 */
class Administrateur extends Utilisateur
{

}
