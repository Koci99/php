<?php

/*
 * Modified: prepend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

return new \Phalcon\Config([
    'database' => [
        'adapter'     => 'Mysql',
        /*'host'        => getenv('MYSQL_HOST'),
        'username'    => getenv('MYSQL_USER'),
        'password'    => getenv('MYSQL_PASSWORD'),
        'dbname'      => getenv('MYSQL_DATABASE'),*/
        /*'host'        => 'dbMysql',
        'username'    => 'tutorial',
        'password'    => 'tutorial',
        'dbname'      => 'tutorial',*/
        'host'        => $_ENV['MYSQL_HOST'],
        'username'    => $_ENV['MYSQL_USER'],
        'password'    => $_ENV['MYSQL_PASSWORD'],
        'dbname'      => $_ENV['MYSQL_DATABASE'],
        'charset'     => 'utf8',
    ],
    'application' => [
        'appDir'         => APP_PATH . '/',
        'controllersDir' => APP_PATH . '/controllers/',
        'modelsDir'      => APP_PATH . '/models/',
        'migrationsDir'  => APP_PATH . '/migrations/',
        'viewsDir'       => APP_PATH . '/views/',
        'pluginsDir'     => APP_PATH . '/plugins/',
        'libraryDir'     => APP_PATH . '/library/',
        'cacheDir'       => BASE_PATH . '/cache/',
        'baseUri'        => '/',
    ],
    'bitcoin' => [
        'url' => "https://bitpay.com/api/rates"
    ]
]);
