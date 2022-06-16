<?php

declare(strict_types=1);

namespace Setono\BotDetectionBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('setono_bot_detection');
        $rootNode = $treeBuilder->getRootNode();

        /** @psalm-suppress MixedMethodCall,PossiblyNullReference,PossiblyUndefinedMethod */
        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('inject')
                    ->addDefaultsIfNotSet()
                    ->children()
                        // <html> tag injections
                        ->arrayNode('html')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->booleanNode('data')
                                    ->defaultFalse()
                                    ->info('If true, it will inject a data-bot attribute into the <html> tag')
                                ->end()
                                ->booleanNode('class')
                                    ->defaultFalse()
                                    ->info('If true, it will inject a class named bot into the <html> tag')
                                ->end()
                            ->end()
                        ->end()
                        // <head> tag injections
                        ->arrayNode('head')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->booleanNode('script')
                                    ->defaultFalse()
                                    ->info('If true, it will inject a <script> tag into the <head> tag')
                                ->end()
                            ->end()
                        ->end()

                        // <body> tag injections
                        ->arrayNode('body')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->booleanNode('data')
                                    ->defaultFalse()
                                    ->info('If true, it will inject a data-bot attribute into the <body> tag')
                                ->end()
                                ->booleanNode('class')
                                    ->defaultFalse()
                                    ->info('If true, it will inject a class named bot into the <body> tag')
                                ->end()
                            ->end()
                        ->end()
        ;

        return $treeBuilder;
    }
}
