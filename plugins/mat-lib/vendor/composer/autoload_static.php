<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8b43724d9540f61eb11a5a246f420a00
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Grav\\Plugin\\MatLib\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Grav\\Plugin\\MatLib\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Grav\\Plugin\\MatLibPlugin' => __DIR__ . '/../..' . '/mat-lib.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8b43724d9540f61eb11a5a246f420a00::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8b43724d9540f61eb11a5a246f420a00::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8b43724d9540f61eb11a5a246f420a00::$classMap;

        }, null, ClassLoader::class);
    }
}
