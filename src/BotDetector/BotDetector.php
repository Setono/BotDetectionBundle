<?php

declare(strict_types=1);

namespace Setono\BotDetectionBundle\BotDetector;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

final class BotDetector implements BotDetectorInterface
{
    /** @var array<string, bool> */
    private array $cache = [];

    private RequestStack $requestStack;

    /** @var list<string> */
    private array $popular;

    /**
     * @param list<string>|null $popular
     */
    public function __construct(RequestStack $requestStack, ?array $popular = null)
    {
        $this->requestStack = $requestStack;
        if (null === $popular) {
            $popular = [
                'Googlebot',
                'meta-externalagent',
                'GPTBot',
                'ClaudeBot',
                'bingbot',
                'Amazonbot',
                'GoogleOther',
                'YandexBot',
                'Bytespider',
                'AhrefsBot',
                'Applebot',
                'SemrushBot',
                'ChatGPT-User',
                'OAI-SearchBot',
                'PerplexityBot',
                'meta-webindexer',
                'facebookexternalhit',
                'Baiduspider',
                'PetalBot',
                'DuckDuckBot',
            ];
        }

        $this->popular = $popular;
    }

    public function isBot(string $userAgent): bool
    {
        if (!isset($this->cache[$userAgent])) {
            $minimalRegex = '#' . implode('|', $this->popular) . '#i';
            $minimalMatch = preg_match($minimalRegex, $userAgent) === 1;
            $this->cache[$userAgent] = $minimalMatch || preg_match(Bots::REGEX, $userAgent) === 1;
        }

        return $this->cache[$userAgent];
    }

    public function isBotRequest(?Request $request = null): bool
    {
        $request = $request ?? $this->requestStack->getMainRequest();
        if (null === $request) {
            return false;
        }

        $userAgent = $request->headers->get('user-agent');
        if (null === $userAgent) {
            return false;
        }

        return $this->isBot($userAgent);
    }
}
