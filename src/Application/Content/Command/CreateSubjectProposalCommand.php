<?php

declare(strict_types=1);

namespace Application\Content\Command;

use Domain\Authentication\Entity\User;

/**
 * class CreateSubjectProposalCommand.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
final class CreateSubjectProposalCommand
{
    public function __construct(
        public readonly User $owner,
        public ?string $subject = null,
    ) {
    }
}
