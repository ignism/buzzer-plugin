<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit13157ee17ff94fc93ea0572a26e24ebe
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Abraham\\TwitterOAuth\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Abraham\\TwitterOAuth\\' => 
        array (
            0 => __DIR__ . '/..' . '/abraham/twitteroauth/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit13157ee17ff94fc93ea0572a26e24ebe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit13157ee17ff94fc93ea0572a26e24ebe::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
