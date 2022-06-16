<?php

declare(strict_types=1);

namespace Setono\BotDetectionBundle\Twig;

use Setono\BotDetectionBundle\BotDetector\BotDetectorInterface;
use Symfony\Component\HttpFoundation\Request;
use Twig\Extension\RuntimeExtensionInterface;

final class Runtime implements RuntimeExtensionInterface
{
    private BotDetectorInterface $botDetector;

    public function __construct(BotDetectorInterface $botDetector)
    {
        $this->botDetector = $botDetector;
    }

    public function isBotRequest(Request $request = null): bool
    {
        return $this->botDetector->isBotRequest($request);
    }

    public function isBot(string $userAgent): bool
    {
        return $this->botDetector->isBot($userAgent);
    }
}
