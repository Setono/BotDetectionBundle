<?php

declare(strict_types=1);

namespace Setono\BotDetectionBundle\Tests\Twig;

use Setono\BotDetectionBundle\BotDetector\BotDetectorInterface;
use Setono\BotDetectionBundle\Twig\Extension;
use Setono\BotDetectionBundle\Twig\Runtime;
use Symfony\Component\HttpFoundation\Request;
use Twig\RuntimeLoader\RuntimeLoaderInterface;
use Twig\Test\IntegrationTestCase;

/**
 * @covers \Setono\BotDetectionBundle\Twig\Extension
 * @covers \Setono\BotDetectionBundle\Twig\Runtime
 */
final class ExtensionTest extends IntegrationTestCase
{
    public function getRuntimeLoaders(): array
    {
        $runtimeLoader = new class() implements RuntimeLoaderInterface {
            /**
             * @param string $class
             */
            public function load($class): Runtime
            {
                $botDetector = new class() implements BotDetectorInterface {
                    public function isBot(string $userAgent): bool
                    {
                        return true;
                    }

                    public function isBotRequest(Request $request = null): bool
                    {
                        return true;
                    }
                };

                return new Runtime($botDetector);
            }
        };

        return [$runtimeLoader];
    }

    public function getExtensions(): array
    {
        return [
            new Extension(),
        ];
    }

    protected function getFixturesDir(): string
    {
        return __DIR__ . '/Fixtures/';
    }
}
