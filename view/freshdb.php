<?php $title = 'Restore Database'; ?>

<?php ob_start(); ?>
<div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4 text-center">Database Restoration Successful</h1>
            <p class="lead text-center">Congratulations! The database has been successfully restored.</p>
            <hr class="my-4">
            <div class="d-flex justify-content-center">
                <a class="btn btn-primary btn-lg" href="<?=BASEURL?>" role="button">Home</a>
            </div>
        </div>
    </div>
<?php $body = ob_get_clean(); ?>

<?php include 'master.php'; ?>