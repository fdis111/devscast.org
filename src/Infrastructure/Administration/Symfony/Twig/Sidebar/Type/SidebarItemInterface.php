<?php

declare(strict_types=1);

namespace Infrastructure\Administration\Symfony\Twig\Sidebar\Type;

/**
 * Interface SidebarItemInterface.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
interface SidebarItemInterface
{
    public function getLabel(): string;
}
