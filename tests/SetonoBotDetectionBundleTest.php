<?php

declare(strict_types=1);

namespace Setono\BotDetectionBundle\Tests;

use Nyholm\BundleTest\TestKernel;
use Setono\BotDetectionBundle\BotDetector\BotDetector;
use Setono\BotDetectionBundle\BotDetector\BotDetectorInterface;
use Setono\BotDetectionBundle\SetonoBotDetectionBundle;
use Setono\BotDetectionBundle\Twig\Extension;
use Setono\BotDetectionBundle\Twig\Runtime;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\KernelInterface;
use Twig\Environment;

/**
 * @covers \Setono\BotDetectionBundle\DependencyInjection\SetonoBotDetectionExtension
 * @covers \Setono\BotDetectionBundle\SetonoBotDetectionBundle
 */
final class SetonoBotDetectionBundleTest extends KernelTestCase
{
    protected static function getKernelClass(): string
    {
        return TestKernel::class;
    }

    /**
     * @param array<mixed> $options
     */
    protected static function createKernel(array $options = []): KernelInterface
    {
        /** @var TestKernel $kernel */
        $kernel = parent::createKernel($options);
        $kernel->addTestBundle(TwigBundle::class);
        $kernel->addTestBundle(SetonoBotDetectionBundle::class);
        $kernel->handleOptions($options);

        // Unused private services are removed from the container, so make the bundle's services public to test them
        $kernel->addTestCompilerPass(new class() implements CompilerPassInterface {
            public function process(ContainerBuilder $container): void
            {
                foreach ($container->getDefinitions() as $id => $definition) {
                    if (str_starts_with($id, 'setono_bot_detection.')) {
                        $definition->setPublic(true);
                    }
                }

                $container->getAlias(BotDetectorInterface::class)->setPublic(true);
            }
        });

        return $kernel;
    }

    /**
     * @test
     */
    public function it_registers_services(): void
    {
        $container = self::getContainer();

        self::assertInstanceOf(BotDetector::class, $container->get(BotDetectorInterface::class));
        self::assertInstanceOf(BotDetector::class, $container->get('setono_bot_detection.bot_detector.default'));
        self::assertInstanceOf(Extension::class, $container->get('setono_bot_detection.twig.extension'));
        self::assertInstanceOf(Runtime::class, $container->get('setono_bot_detection.twig.runtime'));
    }

    /**
     * @test
     */
    public function it_provides_the_twig_functions(): void
    {
        $container = self::getContainer();

        $requestStack = $container->get('request_stack');
        self::assertInstanceOf(RequestStack::class, $requestStack);
        $requestStack->push(new Request([], [], [], [], [], [
            'HTTP_USER_AGENT' => 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)',
        ]));

        $twig = $container->get('twig');
        self::assertInstanceOf(Environment::class, $twig);

        self::assertSame('bot', $twig->createTemplate("{{ is_bot_request() ? 'bot' : 'human' }}")->render());
        self::assertSame('bot', $twig->createTemplate("{{ is_bot('Googlebot/2.1') ? 'bot' : 'human' }}")->render());
        self::assertSame('human', $twig->createTemplate(
            "{{ is_bot('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36') ? 'bot' : 'human' }}",
        )->render());
    }
}
