<?php

declare(strict_types=1);

namespace Setono\BotDetectionBundle\Config;

/**
 * This class represents the injections to make in a HTML response defined by the bundle user in the bundle configuration
 */
final class Injections
{
    public bool $htmlData;

    public bool $htmlClass;

    public bool $headScript;

    public bool $bodyData;

    public bool $bodyClass;

    public function __construct(bool $htmlData, bool $htmlClass, bool $headScript, bool $bodyData, bool $bodyClass)
    {
        $this->htmlData = $htmlData;
        $this->htmlClass = $htmlClass;
        $this->headScript = $headScript;
        $this->bodyData = $bodyData;
        $this->bodyClass = $bodyClass;
    }

    public static function fromArray(array $config): self
    {
        return  new self(
            isset($config['html']['data']) && true === $config['html']['data'],
            isset($config['html']['class']) && true === $config['html']['class'],
            isset($config['head']['script']) && true === $config['head']['script'],
            isset($config['body']['data']) && true === $config['body']['data'],
            isset($config['body']['class']) && true === $config['body']['class'],
        );
    }

    /**
     * Returns true if any injections should be made
     */
    public function hasInjections(): bool
    {
        foreach (['htmlData', 'htmlClass', 'headScript', 'bodyData', 'bodyClass'] as $injection) {
            if (true === $this->{$injection}) {
                return true;
            }
        }

        return false;
    }
}
