<?php

namespace App\Security\Voter;

use App\Entity\Apprenant;
use App\Entity\CM;
use App\Entity\Formateur;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class ApprenantVoter extends Voter
{
    protected function supports($attribute, $subject)
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, ['EDIT', 'VIEW'])
            && $subject instanceof \App\Entity\Apprenant;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        /** @var Apprenant $subject */
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        // ... (check conditions and return true to grant permission) ...
        switch ($attribute) {
            case 'EDIT':
                return ($user==$subject || $user instanceof Formateur);
                // logic to determine if the user can EDIT
                // return true or false
                break;
            case 'VIEW':
                 return ($user==$subject || $user instanceof Formateur || $user instanceof CM);
                break;
        }

        return false;
    }
}
