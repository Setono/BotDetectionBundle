<?php

declare(strict_types=1);

namespace Setono\BotDetectionBundle\BotDetector;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

final class BotDetector implements BotDetectorInterface
{
    private RequestStack $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function isBot(string $userAgent): bool
    {
        return preg_match(Bots::REGEX, $userAgent) === 1;
    }

    public function isBotRequest(Request $request = null): bool
    {
        if (null === $request) {
            $request = $this->requestStack->getMasterRequest();
            if (null === $request) {
                return false;
            }
        }

        $userAgent = $request->headers->get('user-agent');
        if (null === $userAgent) {
            return false;
        }

        return $this->isBot($userAgent);
    }
}
