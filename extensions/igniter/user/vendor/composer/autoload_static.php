<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit643f2cf0cacd940eaa1c0d08cb148f11
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit643f2cf0cacd940eaa1c0d08cb148f11::$classMap;

        }, null, ClassLoader::class);
    }
}
