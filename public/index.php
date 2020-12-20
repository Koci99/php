<?php
declare(strict_types=1);

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Tracy\Debugger;

/**
 * Debug from Phalcon
*/
error_reporting(E_ALL);
(new Phalcon\Debug())->listen();

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

try {

    /**
     * The FactoryDefault Dependency Injector automatically registers
     * the services that provide a full stack framework.
     */
    $di = new FactoryDefault();

    /**
     * Read services
     */
    include APP_PATH . '/config/services.php';

    /**
     * Handle routes
     */
    include APP_PATH . '/config/router.php';

    /**
     * Define root folder where is .env file and load AUTOLOAD
    */
    define('ENV_PATH', realpath('..'));
    include ENV_PATH . '/vendor/autoload.php';

    /**
     * Load Environment variables
    */
    $dotenv = Dotenv\Dotenv::createImmutable(ENV_PATH);
    $dotenv->load();

    /**
     * Enable Tracy debug
    */
    Debugger::enable(Debugger::DEVELOPMENT);
    Debugger::$logSeverity = E_ALL;

    /**
     * Get config service for use in inline setup below
     */
    $config = $di->getConfig();

    /**
     * Include Autoloader
     */
    include APP_PATH . '/config/loader.php';



    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application($di);

    echo $application->handle($_SERVER['REQUEST_URI'])->getContent();
} catch (\Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}


