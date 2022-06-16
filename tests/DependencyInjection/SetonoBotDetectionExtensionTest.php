<?php

declare(strict_types=1);

namespace Setono\BotDetectionBundle\Tests\DependencyInjection;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use Setono\BotDetectionBundle\BotDetector\BotDetectorInterface;
use Setono\BotDetectionBundle\DependencyInjection\SetonoBotDetectionExtension;

/**
 * @covers \Setono\BotDetectionBundle\DependencyInjection\SetonoBotDetectionExtension
 */
final class SetonoBotDetectionExtensionTest extends AbstractExtensionTestCase
{
    protected function getContainerExtensions(): array
    {
        return [new SetonoBotDetectionExtension()];
    }

    /**
     * @test
     */
    public function it_has_services(): void
    {
        $this->load();

        $this->assertContainerBuilderHasService(BotDetectorInterface::class);
        $this->assertContainerBuilderHasService('setono_bot_detection.bot_detector.default');
        $this->assertContainerBuilderHasAlias(BotDetectorInterface::class, 'setono_bot_detection.bot_detector.default');

        $this->assertContainerBuilderHasService('setono_bot_detection.twig.extension');
        $this->assertContainerBuilderHasService('setono_bot_detection.twig.runtime');
    }
}
