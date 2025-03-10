<?php

declare(strict_types=1);

namespace Infrastructure\Content\Doctrine\Repository;

use Doctrine\Persistence\ManagerRegistry;
use Domain\Content\Entity\Technology;
use Domain\Content\Repository\TechnologyRepositoryInterface;
use Infrastructure\Shared\Doctrine\Repository\AbstractRepository;

/**
 * class TechnologyRepository.
 *
 * @extends AbstractRepository<Technology>
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
final class TechnologyRepository extends AbstractRepository implements TechnologyRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Technology::class);
    }
}
