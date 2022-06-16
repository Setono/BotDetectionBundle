<?php

declare(strict_types=1);

namespace Setono\BotDetectionBundle\Tests\Twig;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Setono\BotDetectionBundle\BotDetector\BotDetectorInterface;
use Setono\BotDetectionBundle\Twig\Runtime;

/**
 * @covers \Setono\BotDetectionBundle\Twig\Runtime
 */
final class RuntimeTest extends TestCase
{
    use ProphecyTrait;

    /**
     * @test
     */
    public function it_returns_true_if_request_is_a_bot(): void
    {
        $botDetector = $this->prophesize(BotDetectorInterface::class);
        $botDetector->isBotRequest(null)->willReturn(true);

        $runtime = new Runtime($botDetector->reveal());
        self::assertTrue($runtime->isBotRequest());
    }

    /**
     * @test
     */
    public function it_returns_true_if_user_agent_is_a_bot(): void
    {
        $botDetector = $this->prophesize(BotDetectorInterface::class);
        $botDetector->isBot('user_agent')->willReturn(true);

        $runtime = new Runtime($botDetector->reveal());
        self::assertTrue($runtime->isBot('user_agent'));
    }
}
