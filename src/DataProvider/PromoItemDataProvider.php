<?php
// api/src/DataProvider/BlogPostItemDataProvider.php

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use ApiPlatform\Core\Exception\ResourceClassNotSupportedException;
use App\Entity\BlogPost;
use App\Entity\Promo;
use App\Repository\PromoRepository;

final class PromoItemDataProvider implements ItemDataProviderInterface, RestrictedDataProviderInterface
{
    public function __construct(PromoRepository $repository)
    {
        $this->repository=$repository;
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return Promo::class === $resourceClass;
    }

    public function getItem(string $resourceClass, $id, string $operationName = null, array $context = []): ?BlogPost
    {
        // Retrieve the blog post item from somewhere then return it or null if not found
        return $data=$this->repository->getAppennantAttente($id);
    }
}