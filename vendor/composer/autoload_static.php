<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitce71ae49f2ba7ad8eba4e7a22375bf34
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Model\\' => 6,
        ),
        'C' => 
        array (
            'Controller\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'Controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitce71ae49f2ba7ad8eba4e7a22375bf34::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitce71ae49f2ba7ad8eba4e7a22375bf34::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitce71ae49f2ba7ad8eba4e7a22375bf34::$classMap;

        }, null, ClassLoader::class);
    }
}
