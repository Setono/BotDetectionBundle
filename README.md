# Symfony Bot Detection Bundle

[![Latest Version][ico-version]][link-packagist]
[![Latest Unstable Version][ico-unstable-version]][link-packagist]
[![Software License][ico-license]](LICENSE)
[![Build Status][ico-github-actions]][link-github-actions]
[![Code Coverage][ico-code-coverage]][link-code-coverage]
[![Mutation testing][ico-infection]][link-infection]

## Installation

```shell
composer require setono/bot-detection-bundle
```

This installs and enables the plugin automatically if you're using Symfony Flex. If not, add the bundle manually
to `bundles.php`.

## Usage

```php
<?php

use Setono\BotDetectionBundle\BotDetector\BotDetectorInterface;

final class YourService
{
    private BotDetectorInterface $botDetector;

    public function __construct(BotDetectorInterface $botDetector)
    {
        $this->botDetector = $botDetector;
    }

    public function yourAction(): void
    {
        if ($this->botDetector->isBotRequest()) {
            // do something to this bot!
        }

        // ...
    }
}
```

[ico-version]: https://poser.pugx.org/setono/bot-detection-bundle/v/stable
[ico-unstable-version]: https://poser.pugx.org/setono/bot-detection-bundle/v/unstable
[ico-license]: https://poser.pugx.org/setono/bot-detection-bundle/license
[ico-github-actions]: https://github.com/Setono/BotDetectionBundle/workflows/build/badge.svg
[ico-code-coverage]: https://codecov.io/gh/Setono/BotDetectionBundle/branch/master/graph/badge.svg
[ico-infection]: https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2FSetono%2FBotDetectionBundle%2Fmaster

[link-packagist]: https://packagist.org/packages/setono/bot-detection-bundle
[link-github-actions]: https://github.com/Setono/BotDetectionBundle/actions
[link-code-coverage]: https://codecov.io/gh/Setono/BotDetectionBundle
[link-infection]: https://dashboard.stryker-mutator.io/reports/github.com/Setono/BotDetectionBundle/master
