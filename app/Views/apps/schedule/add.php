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
                                <h4 class="card-title">Jadwal Kapal</h4>
                                <p class="card-title-desc">Tambah Jadwal</p>
                            </div>
                            <div class="card-body p-4">
                                <div class="row">
                                    <form action="<?php echo base_url('/schedule'); ?>" method="post">
                                        <div class="mb-3">
                                            <label for="choices-single-default" class="form-label font-size-13 text-muted">Nama Kapal</label>
                                            <select class="form-control" data-trigger name="shipid" id="choices-single-default" placeholder="Nama Kapal">
                                                <?php foreach($ships as $ship): ?>
                                                    <option value="<?=$ship['ship_id']?>"><?=$ship['ship_type']?>. <?=$ship['ship_name']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-date-input" class="form-label">Tanggal Tiba</label>
                                            <input class="form-control" name="datearrive" type="date" value="<?= date('Y-m-d');?>" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-time-input" class="form-label">Jam Tiba</label>
                                            <input class="form-control" name="timearrive" type="time"  >
                                        </div>
                                        <div class="mb-3">
                                            <label for="choices-single-default" class="form-label font-size-13 text-muted">Asal</label>
                                            <select class="form-control" data-trigger name="origin"  placeholder="Pelabuhan Asal">
                                            <?php foreach($ports as $port): ?>
                                                <option value="<?=$port['port_id']?>"><?=$port['port_name']?></option>
                                            <?php endforeach;?>
                                            </select>
                                        </div> 
                                        <div class="mb-3">
                                            <label for="example-date-input" class="form-label">Tanggal Berangkat</label>
                                            <input class="form-control" name="datedepture" type="date" value="<?= date('Y-m-d');?>" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-time-input" class="form-label">Jam Berangkat</label>
                                            <input class="form-control" name="timedepture" type="time"  >
                                        </div>
                                        <div class="mb-3">
                                            <label for="choices-single-default" class="form-label font-size-13 text-muted">Tujuan</label>
                                            <select class="form-control" data-trigger name="destination"  placeholder="Pelabuhan Tujuan">
                                            <?php foreach($ports as $port): ?>
                                                <option value="<?=$port['port_id']?>"><?=$port['port_name']?></option>
                                            <?php endforeach;?>
                                            </select>
                                        </div> 
                                        <div class="mb-3">
                                            <label for="choices-single-default" class="form-label font-size-13 text-muted">Rute</label>
                                            <select class="form-control" data-trigger name="route"  placeholder="Rute">
                                            <?php foreach($routes as $route): ?>
                                                <option value="<?=$route['route_id']?>"><?=$route['route_desc']?></option>
                                            <?php endforeach;?>
                                            </select>
                                        </div> 
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-label">Status</label>
                                            <input class="form-control" name="status" type="text" value="" >
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