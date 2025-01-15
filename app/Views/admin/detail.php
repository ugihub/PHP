<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">User Detail</h1>
    <div class="row">
        <div class="col-lg-8">
            <?php d($user);?>
        </div>
    </div>


</div>

<?= $this->endSection(); ?>