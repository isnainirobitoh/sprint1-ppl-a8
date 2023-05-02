<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit256e66a4da4d7a87a070a09671c52c90
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit256e66a4da4d7a87a070a09671c52c90::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit256e66a4da4d7a87a070a09671c52c90::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit256e66a4da4d7a87a070a09671c52c90::$classMap;

        }, null, ClassLoader::class);
    }
}
