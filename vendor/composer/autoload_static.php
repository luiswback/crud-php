<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7ae5ce4d42a2db29243e045fe25f2c1f
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7ae5ce4d42a2db29243e045fe25f2c1f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7ae5ce4d42a2db29243e045fe25f2c1f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7ae5ce4d42a2db29243e045fe25f2c1f::$classMap;

        }, null, ClassLoader::class);
    }
}
