<?php

declare(strict_types=1);

namespace Domain\Authentication\Event;

use Domain\Authentication\Entity\User;

/**
 * class UserRegisteredEvent.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
final class UserRegisteredEvent
{
    public function __construct(
        public readonly User $user,
    ) {
    }
}
