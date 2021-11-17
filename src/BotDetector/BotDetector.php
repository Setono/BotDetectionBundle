<?php

declare(strict_types=1);

namespace Setono\BotDetectionBundle\BotDetector;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

final class BotDetector implements BotDetectorInterface
{
    private RequestStack $requestStack;

    /** @var array<string, bool> */
    private array $cache = [];

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function isBot(string $userAgent): bool
    {
        if (!isset($this->cache[$userAgent])) {
            $this->cache[$userAgent] = preg_match(Bots::REGEX, $userAgent) === 1;
        }

        return $this->cache[$userAgent];
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
