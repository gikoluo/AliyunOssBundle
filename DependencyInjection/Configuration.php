<?php

namespace Giko\AliyunOssBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
    
        $treeBuilder
        ->root('giko_aliyun_oss')
        ->children()
        ->scalarNode('server')->isRequired()->end()
        ->scalarNode('accessKeyId')->isRequired()->end()
        ->scalarNode('accessKeySecret')->isRequired()->end()
        ->scalarNode('bucket')->isRequired()->end()
        ->scalarNode('cdn_domain')->isRequired()->end()
        ->end()
        ->end()
        ;
    
        return $treeBuilder;
    }
}
