<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Setono\BotDetectionBundle\BotDetector\BotDetector;
use Setono\BotDetectionBundle\BotDetector\BotDetectorInterface;
use Setono\BotDetectionBundle\Twig\Extension;
use Setono\BotDetectionBundle\Twig\Runtime;

return static function (ContainerConfigurator $container): void {
    /**
     * Use this collection to add popular bots to the bot detector. This will speed up detection when the bot is one of these.
     * These are regexes that should match the user agent of the respective bot. They are matched case-insensitively.
     */
    $container->parameters()->set('setono_bot_detection.popular_bots', [
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
    ]);

    $services = $container->services();

    $services->alias(BotDetectorInterface::class, 'setono_bot_detection.bot_detector.default');

    $services->set('setono_bot_detection.bot_detector.default', BotDetector::class)
        ->args([
            service('request_stack'),
            param('setono_bot_detection.popular_bots'),
        ]);

    $services->set('setono_bot_detection.twig.extension', Extension::class)
        ->tag('twig.extension');

    $services->set('setono_bot_detection.twig.runtime', Runtime::class)
        ->args([service('setono_bot_detection.bot_detector.default')])
        ->tag('twig.runtime');
};
