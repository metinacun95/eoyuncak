<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf4d0e5c8503b526e1dc01f9568aeacd9
{
    public static $files = array (
        'da253f61703e9c22a5a34f228526f05a' => __DIR__ . '/..' . '/wixel/gump/gump.class.php',
    );

    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Buki\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Buki\\' => 
        array (
            0 => __DIR__ . '/..' . '/izniburak/pdox/src',
        ),
    );

    public static $classMap = array (
        'EasyPeasyICS' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/EasyPeasyICS.php',
        'PHPMailer' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
        'PHPMailerOAuth' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauth.php',
        'PHPMailerOAuthGoogle' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauthgoogle.php',
        'POP3' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.pop3.php',
        'SMTP' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.smtp.php',
        'ntlm_sasl_client_class' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/ntlm_sasl_client.php',
        'phpmailerException' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf4d0e5c8503b526e1dc01f9568aeacd9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf4d0e5c8503b526e1dc01f9568aeacd9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf4d0e5c8503b526e1dc01f9568aeacd9::$classMap;

        }, null, ClassLoader::class);
    }
}
