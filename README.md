# Symfony Bot Detection Bundle

[![Latest Version][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE)
[![Build Status][ico-github-actions]][link-github-actions]
[![Code Coverage][ico-code-coverage]][link-code-coverage]
[![Mutation testing][ico-infection]][link-infection]

Detect if the user agent is a bot and act upon it. The detection is based on the bot list from
[matomo-org/device-detector](https://github.com/matomo-org/device-detector), which is compiled into a single regular
expression and updated weekly.

Before the full bot list is used, the user agent is checked against a short list of the most active crawlers
(search engines, AI crawlers, SEO tools and social media fetchers). This makes it much faster to detect the most common
bots and hence speeds up your request cycle.

## Requirements

- PHP 8.1 or higher
- Symfony 6.4, 7.4 or 8

## Installation

```shell
composer require setono/bot-detection-bundle
```

If you use Symfony Flex, the bundle is enabled automatically. Otherwise, add it to `config/bundles.php`:

```php
<?php

return [
    // ...
    Setono\BotDetectionBundle\SetonoBotDetectionBundle::class => ['all' => true],
];
```

## Usage

### In your services

Inject `BotDetectorInterface`:

```php
<?php

use Setono\BotDetectionBundle\BotDetector\BotDetectorInterface;

final class YourService
{
    public function __construct(private readonly BotDetectorInterface $botDetector)
    {
    }

    public function yourAction(string $userAgent): void
    {
        // Checks the user agent of the current main request
        if ($this->botDetector->isBotRequest()) {
            // do something to this bot!
        }

        // Checks a user agent string
        if ($this->botDetector->isBot($userAgent)) {
            // ...
        }
    }
}
```

`isBotRequest()` also accepts a `Request` object. It returns `false` if there is no request or the request has no
`User-Agent` header.

### In Twig templates

```twig
{% if is_bot_request() %}
    I knew you were a bot!
{% endif %}

{% if is_bot(user_agent) %}
    This user agent is a bot
{% endif %}
```

## Configuration

The list of the most active crawlers is the `setono_bot_detection.popular_bots` parameter. You can override it in
`config/services.yaml`, e.g. to put the bots that visit your site the most first:

```yaml
parameters:
    setono_bot_detection.popular_bots:
        - Googlebot
        - bingbot
        - MyCustomCrawler
```

Each entry is a regular expression that is matched case-insensitively against the user agent. A user agent that matches
an entry is treated as a bot, so keep the entries specific. A user agent that doesn't match any of them is still checked
against the full bot list.

[ico-version]: https://poser.pugx.org/setono/bot-detection-bundle/v/stable
[ico-license]: https://poser.pugx.org/setono/bot-detection-bundle/license
[ico-github-actions]: https://github.com/Setono/BotDetectionBundle/workflows/build/badge.svg
[ico-code-coverage]: https://codecov.io/gh/Setono/BotDetectionBundle/branch/master/graph/badge.svg
[ico-infection]: https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2FSetono%2FBotDetectionBundle%2Fmaster

[link-packagist]: https://packagist.org/packages/setono/bot-detection-bundle
[link-github-actions]: https://github.com/Setono/BotDetectionBundle/actions
[link-code-coverage]: https://codecov.io/gh/Setono/BotDetectionBundle
[link-infection]: https://dashboard.stryker-mutator.io/reports/github.com/Setono/BotDetectionBundle/master
