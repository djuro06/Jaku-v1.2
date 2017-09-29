<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4463570a9c13195cc7e59b2f54f9227e
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Madcoda\\Youtube\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Madcoda\\Youtube\\' => 
        array (
            0 => __DIR__ . '/..' . '/madcoda/php-youtube-api/src',
        ),
    );

    public static $classMap = array (
        'Madcoda\\compat' => __DIR__ . '/..' . '/madcoda/php-youtube-api/src/compat.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4463570a9c13195cc7e59b2f54f9227e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4463570a9c13195cc7e59b2f54f9227e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4463570a9c13195cc7e59b2f54f9227e::$classMap;

        }, null, ClassLoader::class);
    }
}
