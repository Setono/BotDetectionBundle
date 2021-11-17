<?php

declare(strict_types=1);

namespace Setono\BotDetectionBundle\Tests\Benchmark;

use DeviceDetector\Parser\Bot as BotParser;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;
use Setono\BotDetectionBundle\BotDetector\BotDetector;
use Symfony\Component\HttpFoundation\RequestStack;

final class BotDetectorBench
{
    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function bench_is_bot(): void
    {
        $detector = new BotDetector(new RequestStack());

        $bots = require __DIR__ . '/../data/bots.php';

        foreach ($bots as $bot) {
            $detector->isBot($bot);
        }
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function bench_matomo(): void
    {
        $botParser = new BotParser();

        $bots = require __DIR__ . '/../data/bots.php';

        foreach ($bots as $bot) {
            $botParser->setUserAgent($bot);
            $botParser->discardDetails();
            $botParser->parse();
        }
    }
}
