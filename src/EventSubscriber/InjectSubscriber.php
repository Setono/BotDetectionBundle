<?php

declare(strict_types=1);

namespace Setono\BotDetectionBundle\EventSubscriber;

use Setono\BotDetectionBundle\Config\Injections;
use Setono\MainRequestTrait\MainRequestTrait;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class InjectSubscriber implements EventSubscriberInterface
{
    use MainRequestTrait;

    private Injections $injections;

    public function __construct(Injections $injections)
    {
        $this->injections = $injections;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::RESPONSE => 'inject',
        ];
    }

    public function inject(ResponseEvent $event): void
    {
        if(!$this->isMainRequest($event) || !$this->injections->hasInjections()) {
            return;
        }

        $response = $event->getResponse();
        $content = $response->getContent();
        if (false === $content) {
            return;
        }

        $injection = '';

        $request = $event->getRequest();

        $content = str_replace('</body>', $injection . '</body>', $content);

        $response->setContent($content);
    }
}
