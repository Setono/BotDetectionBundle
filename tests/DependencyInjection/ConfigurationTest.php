<?php

declare(strict_types=1);

namespace Setono\BotDetectionBundle\Tests\DependencyInjection;

use Matthias\SymfonyConfigTest\PhpUnit\ConfigurationTestCaseTrait;
use PHPUnit\Framework\TestCase;
use Setono\BotDetectionBundle\DependencyInjection\Configuration;

/**
 * @covers \Setono\BotDetectionBundle\DependencyInjection\Configuration
 */
final class ConfigurationTest extends TestCase
{
    use ConfigurationTestCaseTrait;

    protected function getConfiguration(): Configuration
    {
        return new Configuration();
    }
}
