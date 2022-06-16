<?php

declare(strict_types=1);

namespace Setono\BotDetectionBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class Extension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('is_bot', [Runtime::class, 'isBot']),
            new TwigFunction('is_bot_request', [Runtime::class, 'isBotRequest']),
        ];
    }
}
