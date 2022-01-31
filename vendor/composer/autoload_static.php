<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd698b2b7b36add4808be1e1dc947d7d9
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/src/Twilio',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd698b2b7b36add4808be1e1dc947d7d9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd698b2b7b36add4808be1e1dc947d7d9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd698b2b7b36add4808be1e1dc947d7d9::$classMap;

        }, null, ClassLoader::class);
    }
}