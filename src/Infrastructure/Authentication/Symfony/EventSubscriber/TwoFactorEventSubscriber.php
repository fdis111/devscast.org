<?php

declare(strict_types=1);

namespace Infrastructure\Authentication\Symfony\EventSubscriber;

use Domain\Authentication\Event\TwoFactorDisabledEvent;
use Domain\Authentication\Event\TwoFactorEnabledEvent;
use Infrastructure\Shared\Symfony\Mailer\Mailer;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class TwoFactorEventSubscriber.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
final class TwoFactorEventSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private readonly Mailer $mailer,
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            TwoFactorEnabledEvent::class => 'onTwoFactorEnabled',
            TwoFactorDisabledEvent::class => 'onTwoFactorDisabled',
        ];
    }

    public function onTwoFactorDisabled(TwoFactorDisabledEvent $event): void
    {
        $this->mailer->sendNotificationEmail(
            $event,
            template: '@app/domain/authentication/mail/two_factor_enabled.mail.twig',
            subject: 'authentication.mails.subjects.two_factor_enabled',
            domain: 'authentication'
        );
    }

    public function onTwoFactorEnabled(TwoFactorEnabledEvent $event): void
    {
        $this->mailer->sendNotificationEmail(
            $event,
            template: '@app/domain/authentication/mail/two_factor_disabled.mail.twig',
            subject: 'authentication.mails.subjects.two_factor_disabled',
            domain: 'authentication'
        );
    }
}
