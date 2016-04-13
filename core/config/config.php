<?php

$auxilium = array();
$auxilium['APP_NAME'] = 'Najbolje kafane';
$auxilium['APP_URL'] = 'www.najboljekafane.dev';
$auxilium['APP_TIMEZONE'] = 'Europe/Belgrade';
//$auxilium['DEBUG'] = TRUE;
$auxilium['ROUTER'] = TRUE;
$auxilium['ADMIN_UN'] = 'admin';
$auxilium['ADMIN_PWD'] = 'abe45d28281cfa2a4201c9b90a143095';

foreach ($auxilium as $constant => $value) {
    
    define($constant, $value);
    
}


 

