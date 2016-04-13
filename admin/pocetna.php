<?php
require_once '../app.php';
session_start();
session_regenerate_id();
if(!isset($_SESSION['USER'])||$_SESSION['USER']!=='A'){
    header('Location: /admin');
}
require_once 'class.admin.php';
get_header();
?>

<h1>ADMIN HOME</h1>

<?php get_footer();?>
