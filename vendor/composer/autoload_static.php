<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite0c893f526de791da791ee13cbbf128f
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Inc\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite0c893f526de791da791ee13cbbf128f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite0c893f526de791da791ee13cbbf128f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
