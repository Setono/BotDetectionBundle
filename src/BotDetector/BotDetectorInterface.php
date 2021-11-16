<?php

declare(strict_types=1);

namespace Setono\BotDetectionBundle\BotDetector;

interface BotDetectorInterface
{
    public function isBot(string $userAgent = null): bool;
}
