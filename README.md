# Symfony Bot Detection Bundle

[![Latest Version][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE)
[![Build Status][ico-github-actions]][link-github-actions]
[![Code Coverage][ico-code-coverage]][link-code-coverage]
[![Mutation testing][ico-infection]][link-infection]

Detect if the user agent is a bot and act upon it. Under the hood this bundle uses the [matomo-org/device-detector](https://github.com/matomo-org/device-detector),
but instead of just using that library this library has a very small subset of user agents that it checks first (i.e. major search engines).
This makes it much faster in detecting those very common bots and hence speeds up your request cycle.

## Installation

```shell
composer require setono/bot-detection-bundle
```

This installs and enables the plugin automatically if you're using Symfony Flex. If not, add the bundle manually
to `bundles.php`.

## Usage

You can use the bot detector in your services:

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

and you can use it inside your twig templates:

```twig
{% if is_bot_request() %}
    I knew you where a bot!
{% endif %}
```
[ico-version]: https://poser.pugx.org/setono/bot-detection-bundle/v/stable
[ico-license]: https://poser.pugx.org/setono/bot-detection-bundle/license
[ico-github-actions]: https://github.com/Setono/BotDetectionBundle/workflows/build/badge.svg
[ico-code-coverage]: https://codecov.io/gh/Setono/BotDetectionBundle/branch/master/graph/badge.svg
[ico-infection]: https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2FSetono%2FBotDetectionBundle%2Fmaster

[link-packagist]: https://packagist.org/packages/setono/bot-detection-bundle
[link-github-actions]: https://github.com/Setono/BotDetectionBundle/actions
[link-code-coverage]: https://codecov.io/gh/Setono/BotDetectionBundle
[link-infection]: https://dashboard.stryker-mutator.io/reports/github.com/Setono/BotDetectionBundle/master
