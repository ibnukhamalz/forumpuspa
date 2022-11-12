<?php
$this->load->view("layouts/header");
$this->load->view("layouts/menu");
?>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3><?= $title ?? '' ?></h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"><?= $title ?? '' ?></li>
                        <li class="breadcrumb-item active"><?= $subtitle ?? '' ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view($container); ?>
</div>
<?php
$this->load->view("layouts/footer");
?>