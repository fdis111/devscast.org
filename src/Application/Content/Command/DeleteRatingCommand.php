<?php

declare(strict_types=1);

namespace Application\Content\Command;

use Domain\Content\Entity\Rating;

/**
 * class DeleteRatingCommand.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
final class DeleteRatingCommand
{
    public function __construct(
        public readonly Rating $rating
    ) {
    }
}
