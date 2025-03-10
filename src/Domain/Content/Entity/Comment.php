<?php

declare(strict_types=1);

namespace Domain\Content\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Domain\Shared\Entity\AbstractEntity;
use Domain\Shared\Entity\OwnerTrait;

/**
 * Class Comment.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
class Comment extends AbstractEntity
{
    use OwnerTrait;

    private ?string $content = null;

    private ?Content $target = null;

    private ?self $parent = null;

    private bool $has_replies = false;

    /**
     * @var Collection<self>
     */
    private Collection $replies;

    public function __construct()
    {
        $this->replies = new ArrayCollection();
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getTarget(): ?Content
    {
        return $this->target;
    }

    public function setTarget(?Content $target): self
    {
        $this->target = $target;

        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function getReplies(): Collection
    {
        return $this->replies;
    }

    public function addReply(self $comment): self
    {
        if (! $this->replies->contains($comment)) {
            $this->replies->add($comment);
            $comment->setParent($this);
            $this->setHasReplies(true);
        }

        return $this;
    }

    public function removeReply(self $comment): self
    {
        if ($this->replies->contains($comment)) {
            $this->replies->removeElement($comment);

            if ($this->replies->isEmpty()) {
                $this->setHasReplies(false);
            }
        }

        return $this;
    }

    public function isHasReplies(): bool
    {
        return $this->has_replies;
    }

    public function setHasReplies(bool $has_replies): self
    {
        $this->has_replies = $has_replies;

        return $this;
    }
}
