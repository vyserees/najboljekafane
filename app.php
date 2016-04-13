<?php
/**
 * Created by PhpStorm.
 * User: vlada
 * Date: 13.4.16.
 * Time: 08.22
 */

define('MVC_PATH', dirname(__FILE__));
define('APP_PATH', MVC_PATH . '/core/');

require_once APP_PATH.'config/config.php';
require_once APP_PATH.'config/db.php';
date_default_timezone_set('Europe/Belgrade');

function class_autoloader()
{
    $possible_locations = array(
        APP_PATH.'helpers/auth.php',
        APP_PATH.'helpers/email.php',
        APP_PATH.'helpers/paypal.php',
        APP_PATH.'helpers/phpmailer.php',
        APP_PATH.'helpers/pop3.php',
        APP_PATH.'helpers/query.php',
        APP_PATH.'helpers/smtp.php',
        APP_PATH.'helpers/tables.php'
    );
    foreach ($possible_locations as $location) {
        if (file_exists($location)) {
            require_once $location;
        }
    }
    return TRUE;
}
spl_autoload_register('class_autoloader');
require_once APP_PATH.'functions.php';