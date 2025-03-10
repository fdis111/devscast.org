<?php

declare(strict_types=1);

namespace Domain\Authentication\ValueObject;

use Webmozart\Assert\Assert;

/**
 * Class Gender.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
class Gender implements \Stringable
{
    public const VALUES = ['M', 'F', 'O'];
    public const CHOICES = [
        'authentication.value_object.gender.masculine' => 'M',
        'authentication.value_object.gender.feminine' => 'F',
        'authentication.value_object.gender.other' => 'O',
    ];

    private readonly string $gender;

    private function __construct(string $gender)
    {
        Assert::inArray($gender, self::VALUES);
        $this->gender = $gender;
    }

    public function __toString(): string
    {
        return $this->gender;
    }

    public function getTranslationKey(): string
    {
        return strval(array_search($this->gender, self::CHOICES, true));
    }

    public static function fromString(string $gender): self
    {
        return new self($gender);
    }

    public static function male(): self
    {
        return new self('M');
    }

    public static function female(): self
    {
        return new self('F');
    }

    public static function queer(): self
    {
        return new self('O');
    }

    public function equals(string|self $gender): bool
    {
        if ($gender instanceof self) {
            return $this->gender === $gender->gender;
        }

        return $this->gender === $gender;
    }
}
