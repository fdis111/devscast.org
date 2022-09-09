<?php

declare(strict_types=1);

namespace Application\Authentication\Service;

/**
 * class DefaultPasswordGeneratorService.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
final class CodeGeneratorService
{
    public function generate(int $length = 6): int
    {
        return random_int(10 ** ($length - 1), 10 ** $length - 1);
    }

    public function generateToken(int $lenght = 60): string
    {
        return random_bytes(max(1, $lenght));
    }
}
