<?php

declare(strict_types=1);

namespace Setono\BotDetectionBundle\BotDetector;

use Setono\MainRequestTrait\MainRequestTrait;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

final class BotDetector implements BotDetectorInterface
{
    /** @var array<string, bool> */
    private array $cache = [];

    /** @var list<string> */
    private array $popular;

    /**
     * @param list<string>|null $popular
     */
    public function __construct(private RequestStack $requestStack, array $popular = null)
    {
        $this->requestStack = $requestStack;
        if (null === $popular) {
            $popular = [
                'Googlebot',
                'Bingbot',
                'Yahoo! Slurp',
                'DuckDuckBot',
                'Baiduspider',
                'YandexBot',
                'facebookexternalhit',
                'facebookcatalog',
                'ia_archiver',
            ];
        }

        $this->popular = $popular;
    }

    public function isBot(string $userAgent): bool
    {
        if (!isset($this->cache[$userAgent])) {
            $minimalRegex = '#' . implode('|', $this->popular) . '#';
            $minimalMatch = preg_match($minimalRegex, $userAgent) === 1;
            $this->cache[$userAgent] = $minimalMatch ?: preg_match(Bots::REGEX, $userAgent) === 1;
        }

        return $this->cache[$userAgent];
    }

    public function isBotRequest(Request $request = null): bool
    {
        $request = $request ?? $this->requestStack->getCurrentRequest();
        if (null === $request) {
            return false;
        }
        assert($request instanceof Request);
        $userAgent = $request->headers->get('user-agent');
        if (null === $userAgent) {
            return false;
        }

        return $this->isBot($userAgent);
    }
}
