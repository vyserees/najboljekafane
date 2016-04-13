<?php
require_once '../app.php';

$post = filter_input_array(INPUT_POST);

if(isset($post['login'])){
    if($post['username']===ADMIN_UN&&md5($post['password'])===ADMIN_PWD){
        session_start();
        session_regenerate_id();
        $_SESSION['USER'] = 'A';
        header('Location: /admin/pocetna.php');
    }else{
        header('Location: /admin/index.php?e=1');
    }
}