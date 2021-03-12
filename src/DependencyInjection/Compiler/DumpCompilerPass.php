<?php

namespace Drupal\container_dumper\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Dumper\XmlDumper;
use Symfony\Component\Filesystem\Filesystem;

class DumpCompilerPass implements CompilerPassInterface
{
    /** @var string|null */
    protected $path;

    public function __construct(
        ?string $path
    ) {
        $this->path = $path;
    }

    public function process(ContainerBuilder $container): void
    {
        $filename = basename($this->path);
        $dirname = DRUPAL_ROOT . DIRECTORY_SEPARATOR . trim(dirname($this->path), DIRECTORY_SEPARATOR);
        $dirname = realpath($dirname);

        if (!is_dir($dirname) && !mkdir($dirname, 0775, true) && !is_dir($dirname)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $dirname));
        }

        $dumper = new XmlDumper($container);
        $filesystem = new Filesystem();

        $filesystem->dumpFile($dirname . DIRECTORY_SEPARATOR . $filename, $dumper->dump());
    }
}
