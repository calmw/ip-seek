<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit596aebc0157e696e1cb8aa5961f036f4
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit596aebc0157e696e1cb8aa5961f036f4::$classMap;

        }, null, ClassLoader::class);
    }
}