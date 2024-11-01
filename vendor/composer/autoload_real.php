<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitcab8d05cc3bf8a2ed2bbd610398baefb
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

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitcab8d05cc3bf8a2ed2bbd610398baefb', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitcab8d05cc3bf8a2ed2bbd610398baefb', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitcab8d05cc3bf8a2ed2bbd610398baefb::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
