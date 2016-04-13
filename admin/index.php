<?php
require_once '../app.php';
get_header();
?>

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="adm-login">
                <h2>ADMIN LOGIN</h2>
                <form action="executeposts.php" method="post">
                    <?php if(null!==filter_input_array(INPUT_GET)){
                        echo '<p class="alert alert-danger">Neispravno korisnicko ime i/ili lozinka!</p>';
                    } ?>
                    <label>Korisnicko ime</label>
                    <input type="text" name="username" class="form-control">
                    <label>Lozinka</label>
                    <input type="password" name="password" class="form-control">
                    <hr>
                    <input type="submit" name="login" value="ULOGUJTE SE" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>

<?php get_footer();?>
