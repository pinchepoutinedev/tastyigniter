<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit6b963f21d0b6e1649e3d5aa601fa558c
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit6b963f21d0b6e1649e3d5aa601fa558c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit6b963f21d0b6e1649e3d5aa601fa558c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit6b963f21d0b6e1649e3d5aa601fa558c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
