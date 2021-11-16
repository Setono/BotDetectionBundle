<?php

declare(strict_types=1);

namespace Setono\BotDetectionBundle\BotDetector;

use Symfony\Component\HttpFoundation\RequestStack;

final class BotDetector implements BotDetectorInterface
{
    private RequestStack $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function isBot(string $userAgent = null): bool
    {
        if (null === $userAgent) {
            $request = $this->requestStack->getMasterRequest();
            if (null === $request) {
                return false;
            }

            $userAgent = $request->headers->get('user-agent');
            if (null === $userAgent) {
                return false;
            }
        }

        return preg_match(Bots::REGEX, $userAgent) === 1;
    }
}
