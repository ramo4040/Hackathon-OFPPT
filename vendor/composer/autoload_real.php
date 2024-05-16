<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit5b1af89d2ae8f7937a973bab60c9c21c
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

        spl_autoload_register(array('ComposerAutoloaderInit5b1af89d2ae8f7937a973bab60c9c21c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit5b1af89d2ae8f7937a973bab60c9c21c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit5b1af89d2ae8f7937a973bab60c9c21c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
