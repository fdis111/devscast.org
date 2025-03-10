<?php

declare(strict_types=1);

namespace Domain\Content\ValueObject;

use Webmozart\Assert\Assert;

/**
 * class ContentStatus.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
class ContentStatus
{
    final public const VALUES = ['draft', 'reviewing', 'published', 'rejected'];
    final public const CHOICES = [
        'content.value_object.content_status.draft' => 'draft',
        'content.value_object.content_status.reviewing' => 'reviewing',
        'content.value_object.content_status.published' => 'published',
        'content.value_object.content_status.rejected' => 'rejected',
    ];
    private string $status = 'draft';

    private function __construct(string $status)
    {
        Assert::inArray($status, self::VALUES);
        $this->status = $status;
    }

    public function __toString(): string
    {
        return $this->status;
    }

    public function getTranslationKey(): string
    {
        return strval(array_search($this->status, self::CHOICES, true));
    }

    public static function draft(): self
    {
        return new self('draft');
    }

    public static function reviewing(): self
    {
        return new self('reviewing');
    }

    public static function rejected(): self
    {
        return new self('rejected');
    }

    public static function published(): self
    {
        return new self('published');
    }

    public static function fromString(string $status): self
    {
        return new self($status);
    }

    public function equals(self|string $status): bool
    {
        if ($status instanceof self) {
            return $status->status === $this->status;
        }

        return $this->status === $status;
    }
}
