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
     * @return iterable<array-key, array<array-key, string>>
     */
    public function getBots(): iterable
    {
        yield ['Googlebot'];
    }
}
