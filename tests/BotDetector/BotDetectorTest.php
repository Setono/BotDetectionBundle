<?php

declare(strict_types=1);

namespace Setono\BotDetectionBundle\Tests\BotDetector;

use PHPUnit\Framework\TestCase;
use Setono\BotDetectionBundle\BotDetector\BotDetector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * @covers \Setono\BotDetectionBundle\BotDetector\BotDetector
 */
final class BotDetectorTest extends TestCase
{
    /**
     * @test
     */
    public function it_uses_request_stack_if_request_is_null(): void
    {
        $requestStack = new RequestStack();
        $requestStack->push(new Request([], [], [], [], [], ['HTTP_USER_AGENT' => 'Googlebot']));
        $botDetector = new BotDetector($requestStack);
        self::assertTrue($botDetector->isBotRequest());
    }

    /**
     * @test
     */
    public function it_returns_false_if_no_request_is_provided_and_no_request_is_present(): void
    {
        $botDetector = new BotDetector(new RequestStack());
        self::assertFalse($botDetector->isBotRequest());
    }

    /**
     * @test
     */
    public function it_returns_false_if_no_request_is_provided_and_the_request_does_not_have_a_user_agent_header(): void
    {
        $requestStack = new RequestStack();
        $requestStack->push(new Request());
        assert($requestStack->getCurrentRequest());
        $botDetector = new BotDetector($requestStack);

        self::assertFalse($botDetector->isBotRequest());
    }

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
