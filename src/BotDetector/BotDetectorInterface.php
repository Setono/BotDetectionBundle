<?php

declare(strict_types=1);

namespace Setono\BotDetectionBundle\BotDetector;

use Symfony\Component\HttpFoundation\Request;

interface BotDetectorInterface
{
    public function isBot(string $userAgent): bool;

    /**
     * Uses the current main request if $request is null
     */
    public function isBotRequest(Request $request = null): bool;
}
