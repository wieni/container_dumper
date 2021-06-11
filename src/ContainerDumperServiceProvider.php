<?php

namespace Drupal\container_dumper;

use Drupal\container_dumper\DependencyInjection\Compiler\DumpCompilerPass;
use Drupal\Core\Config\BootstrapConfigStorageFactory;
use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderInterface;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;

class ContainerDumperServiceProvider implements ServiceProviderInterface
{
    public function register(ContainerBuilder $container): void
    {
        $config = BootstrapConfigStorageFactory::get()->read('container_dumper.settings');
        $path = $config['path'] ?? null;

        $container->addCompilerPass(
            new DumpCompilerPass($path),
            PassConfig::TYPE_BEFORE_REMOVING
        );
    }
}
