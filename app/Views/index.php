<!DOCTYPE html>
<html lang="en">

<head>

    <?= $title_meta ?>

    <?= $this->include('partials/head-css') ?>

</head>

<?= $this->include('partials/body') ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->include('partials/menu') ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <?= $page_title ?>
                <div class="row">
                <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Jumlah Penumpang</h4>
                                <p class="card-title-desc">Rekap Jumlah Penumpang Tahun Ini
                                </p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-dark mb-0">
                                        <thead>
                                            <tr>
                                                <th>Bulan</th>
                                                <th>Penumpang Naik</th>
                                                <th>Penumpang Turun</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($passenger as $key => $p): ?>
                                                <tr>
                                                    <th scope="row"> <?= $p['month'] ?> </th>
                                                    <td> <?= $p['penumpang_naik'] ?>  </td>
                                                    <td><?= $p['penumpang_turun'] ?> </td>
                                                    <td><?= $p['penumpang_turun'] + $p['penumpang_naik'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    
               <!-- new colomn -->
               <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tabel Kunjungan Kapal</h4>
                                <p class="card-title-desc">Rekapitulasi Kunjungan Kapal
                                </p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-dark mb-0">
                                    <thead>
                                            <tr>
                                                <th>Bulan</th>
                                                <th>Jumlah Kunjungan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($track as $key => $p): ?>
                                                <tr>
                                                    <th scope="row"> <?= $p['month'] ?> </th>                                                    
                                                    <td><?=$p['kunjungan_kapal'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
            <div class="row">
            <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tabel Rekap Muatan</h4>
                                <p class="card-title-desc">Rekapitulasi Muatan Di Pelabuhan Poso
                                </p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-dark mb-0">
                                    <thead>
                                            <tr>
                                                <th>Komuditas</th>
                                                <th>Jumlah</th>
                                                <th>Satuan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($load as $key => $p): ?>
                                                <tr>
                                                    <th scope="row"> <?= $p['load_commodity'] ?> </th>                                                    
                                                    <td><?=$p['muat'] ?></td>
                                                    <td><?=$p['load_type'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
           
            <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tabel Rekap Bongkar</h4>
                                <p class="card-title-desc">Rekapitulasi Di Pelabuhan Poso
                                </p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-dark mb-0">
                                    <thead>
                                            <tr>
                                                <th>Komuditas</th>
                                                <th>Jumlah</th>
                                                <th>Satuan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($unload as $key => $p): ?>
                                                <tr>
                                                    <th scope="row"> <?= $p['unload_commodity'] ?> </th>                                                    
                                                    <td><?=$p['bongkar'] ?></td>
                                                    <td><?=$p['unload_type'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    </div>
            </div>
                    <!-- container-fluid -->
        </div>
    </div>
        <!-- End Page-content -->

        <?= $this->include('partials/footer') ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?= $this->include('partials/right-sidebar') ?>

<?= $this->include('partials/vendor-scripts') ?>

<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Plugins js-->
<script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
<!-- dashboard init -->
<script src="assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>
</body>

</html>