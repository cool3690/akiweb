<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit74450337ade09cd98d721d81c68140fb
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
            'PHPJasper\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'PHPJasper\\' => 
        array (
            0 => __DIR__ . '/..' . '/geekcom/phpjasper/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit74450337ade09cd98d721d81c68140fb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit74450337ade09cd98d721d81c68140fb::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
