<?php

declare(strict_types=1);

namespace Application\Content\Handler;

use Application\Content\Command\DeleteRatingCommand;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * class DeleteRatingHandler.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
#[AsMessageHandler]
final class DeleteRatingHandler
{
    public function __invoke(DeleteRatingCommand $command): void
    {
    }
}
