<?php

declare(strict_types=1);

namespace Application\Content\Handler;

use Application\Content\Command\CreateTagCommand;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * class CreateTagHandler.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
#[AsMessageHandler]
final class CreateTagHandler
{
    public function __invoke(CreateTagCommand $command): void
    {
    }
}
