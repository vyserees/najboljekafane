<?php

$auxilium = array();
$auxilium['APP_NAME'] = 'Najbolje kafane';
$auxilium['APP_URL'] = 'www.najboljekafane.dev';
$auxilium['APP_TIMEZONE'] = 'Europe/Belgrade';
//$auxilium['DEBUG'] = TRUE;
$auxilium['ROUTER'] = TRUE;

foreach ($auxilium as $constant => $value) {
    
    define($constant, $value);
    
}


 

