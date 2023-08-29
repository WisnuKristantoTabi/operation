<!doctype html>
<html lang="en">

<head>

    <?= $title_meta ?>

    <?= $this->include('partials/head-css') ?>

</head>

<?= $this->include('partials/body') ?>
 <!-- choices css -->
 <link href="assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" type="text/css" />

<!-- <body data-layout="horizontal"> -->

<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->include('partials/menu') ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <?= $page_title ?>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Kapal</h4>
                                <p class="card-title-desc">Tambah Data Kapal</p>
                            </div>
                            <div class="card-body p-4">
                                <div class="row">
                                    <form action="<?php echo base_url('/ship'); ?>" method="post">
                                       
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-label">Nama Kapal</label>
                                            <input class="form-control" name="shipname" type="text" value="" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-label">Tipe Kapal</label>
                                            <input class="form-control" name="shiptype" type="text" value="" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-label">Gross Ton</label>
                                            <input class="form-control" name="grosston" type="number" value="" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-label">Panjang Kapal</label>
                                            <input class="form-control" name="length" step=any type="number" value="" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-label">Lebar</label>
                                            <input class="form-control" name="width" step=any type="number" value="" >
                                        </div>
                                        <div class="mb-3">
                                            <input type="submit" class="btn btn-primary btn-rounded waves-effect waves-light" name="mysubmit" value="Masukkan Data"  />
                                        </div>
                                       
                                    </form>    
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <?= $this->include('partials/footer') ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<?= $this->include('partials/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<!-- choices js -->
<script src="assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

<!-- init js -->
<script src="assets/js/pages/form-advanced.init.js"></script>
<script src="assets/js/app.js"></script>

</body>

</html>