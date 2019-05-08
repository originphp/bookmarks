<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2748573fff55d10afc2caf40bcefc64d
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Vendor\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Vendor\\' => 
        array (
            0 => __DIR__ . '/../..' . '/vendor',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2748573fff55d10afc2caf40bcefc64d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2748573fff55d10afc2caf40bcefc64d::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
