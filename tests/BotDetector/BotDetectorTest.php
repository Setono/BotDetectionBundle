<?php

declare(strict_types=1);

namespace Setono\BotDetectionBundle\Tests\BotDetector;

use PHPUnit\Framework\TestCase;
use Setono\BotDetectionBundle\BotDetector\BotDetector;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * @covers \Setono\BotDetectionBundle\BotDetector\BotDetector
 */
final class BotDetectorTest extends TestCase
{
    /**
     * @dataProvider getBots
     * @test
     */
    public function it_detects_common_bots(string $userAgent): void
    {
        $botDetector = new BotDetector(new RequestStack());
        self::assertTrue($botDetector->isBot($userAgent));
    }

    /**
     * @dataProvider getHumanUserAgents
     * @test
     */
    public function it_does_not_detect_common_human_user_agents(string $userAgent): void
    {
        $botDetector = new BotDetector(new RequestStack());
        self::assertFalse($botDetector->isBot($userAgent));
    }

    /**
     * @return iterable<array-key, array<array-key, string>>
     */
    public function getBots(): iterable
    {
        $bots = require __DIR__ . '/../data/bots.php';
        foreach ($bots as $bot) {
            yield [$bot];
        }
    }

    /**
     * @return iterable<array-key, array<array-key, string>>
     */
    public function getHumanUserAgents(): iterable
    {
        $humans = require __DIR__ . '/../data/humans.php';
        foreach ($humans as $human) {
            yield [$human];
        }
    }
}
