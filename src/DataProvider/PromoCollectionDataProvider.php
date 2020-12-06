<?php
namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use ApiPlatform\Core\DataProvider\SerializerAwareDataProviderInterface;
use ApiPlatform\Core\DataProvider\SerializerAwareDataProviderTrait;
use ApiPlatform\Core\Exception\ResourceClassNotSupportedException;
use App\Entity\Promo;
use App\Repository\PromoRepository;

final class PromoCollectionDataProvider implements ContextAwareCollectionDataProviderInterface, RestrictedDataProviderInterface
{
    public function __construct(PromoRepository $repository){
        $this->repository=$repository;
    }
    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {

        if ($operationName!="get_promo_ref_forma" || $operationName!="getApprenantGroupePrincipal")
        {
            return Promo::class === $resourceClass;
        }
        return false;
    }

    public function getCollection(string $resourceClass, string $operationName = null, array $context = []): iterable
    {

        $data = $this->repository->getAppennantAttente();
        return $data;
    }

}