<?php
namespace Giko\AliyunOssBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class GikoAliyunOssExtension extends Extension 
{
    /**
     *
     * {@inheritdoc}
     *
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');
        
        if (isset($config['serverInternal'])) {
            $container->setParameter('giko_aliyun.oss.serverInternal', $config['serverInternal']);
        }
        
        if (isset($config['server'])) {
            $container->setParameter('giko_aliyun.oss.server', $config['server']);
        }
        
        if (isset($config['accessKeyId'])) {
            $container->setParameter('giko_aliyun.oss.accessKeyId', $config['accessKeyId']);
        }
        
        if (isset($config['accessKeySecret'])) {
            $container->setParameter('giko_aliyun.oss.accessKeySecret', $config['accessKeySecret']);
        }
        
        if (isset($config['bucketname'])) {
            $container->setParameter('giko_aliyun.oss.bucketname', $config['bucketname']);
        }
    }
}
