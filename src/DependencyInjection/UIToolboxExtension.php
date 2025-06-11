<?php

namespace AppoloDev\UIToolboxBundle\DependencyInjection;

use Symfony\Component\AssetMapper\AssetMapperInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class UIToolboxExtension extends Extension implements PrependExtensionInterface
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../../config'));
        $loader->load('services.yaml');
    }

    public function prepend(ContainerBuilder $container): void
    {

        $bundles = $container->getParameter('kernel.bundles');
        if (!\is_array($bundles)) {
            return;
        }

        if (isset($bundles['TwigComponentBundle'])) {
            $container->prependExtensionConfig('twig_component', [
                'defaults' => [
                    'AppoloDev\UIToolboxBundle\UI\Actions\Button\\' => '@UIToolbox/ui/actions/button/',
                ],
            ]);
        }


        if ($this->isAssetMapperAvailable($container)) {
            $container->prependExtensionConfig('framework', [
                'asset_mapper' => [
                    'paths' => [
                        __DIR__.'/../../assets' => 'ui-toolbox',
                    ],
                ],
            ]);
        }
    }

    private function isAssetMapperAvailable(ContainerBuilder $container): bool
    {
        if (!\interface_exists(AssetMapperInterface::class)) {
            return false;
        }

        // check that FrameworkBundle 6.3 or higher is installed
        $bundlesMetadata = $container->getParameter('kernel.bundles_metadata');
        if (!\is_array($bundlesMetadata)) {
            return false;
        }
        if (!isset($bundlesMetadata['FrameworkBundle'])) {
            return false;
        }

        return \is_file($bundlesMetadata['FrameworkBundle']['path'].'/Resources/config/asset_mapper.php');
    }
}
