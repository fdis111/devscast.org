<?php

declare(strict_types=1);

namespace Application\Content\Handler;

use Application\Content\Command\UpdatePostCommand;
use Application\Content\Service\ContentService;
use Application\Shared\Mapper;
use Domain\Content\Repository\PostRepositoryInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * class UpdatePostHandler.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
#[AsMessageHandler]
final class UpdatePostHandler
{
    public function __construct(
        private readonly PostRepositoryInterface $repository,
        private readonly ContentService $contentService,
    ) {
    }

    public function __invoke(UpdatePostCommand $command): void
    {
        $this->contentService->assertPublishableContent($command);
        $this->repository->save(Mapper::getHydratedObject($command, $command->state));
    }
}
