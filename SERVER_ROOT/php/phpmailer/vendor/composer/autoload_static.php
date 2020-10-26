<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit806320f867cbc5221f6c3e766c26fb93
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit806320f867cbc5221f6c3e766c26fb93::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit806320f867cbc5221f6c3e766c26fb93::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}