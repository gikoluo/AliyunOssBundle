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

//     public function prepend(ContainerBuilder $container)
//     {
//         // get all bundles
//         $bundles = $container->getParameter('kernel.bundles');
//         // determine if AcmeGoodbyeBundle is registered
//         if (isset($bundles['SonataMediaBundle'])) {
//             // disable AcmeGoodbyeBundle in bundles
//             $config = array(
//                 'use_acme_goodbye' => false
//             );
//             foreach ($container->getExtensions() as $name => $extension) {
//                 echo $name;
//                 switch ($name) {
//                     case 'sonata_media':
//                     case 'giko_aliyun':
//                         // set use_acme_goodbye to false in the config of
//                         // acme_something and acme_other note that if the user manually
//                         // configured use_acme_goodbye to true in the app/config/config.yml
//                         // then the setting would in the end be true and not false
//                         $container->prependExtensionConfig($name, $config);
                        
//                         print_r($config);
                        
//                         break;
//                 }
//             }
//         }
        
//         // process the configuration of AcmeHelloExtension
//         $configs = $container->getExtensionConfig($this->getAlias());
//         // use the Configuration class to generate a config array with
//         // the settings "acme_hello"
//         $config = $this->processConfiguration(new Configuration(), $configs);
        
//         // check if entity_manager_name is set in the "acme_hello" configuration
//         if (isset($config['entity_manager_name'])) {
//             // prepend the acme_something settings with the entity_manager_name
//             $config = array(
//                 'entity_manager_name' => $config['entity_manager_name']
//             );
//             $container->prependExtensionConfig('acme_something', $config);
//         }
//     }
}
