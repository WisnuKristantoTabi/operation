<!doctype html>
<html lang="en">

<head>

    <?= $title_meta ?>

    <?= $this->include('partials/head-css') ?>

</head>

<?= $this->include('partials/body') ?>

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

                <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Jadwal Kapal</h4>
                                <?php $timezone = date_default_timezone_get();
                                    echo "The current server timezone is: " . $timezone; ?>
                                <h4><?php echo date('Y-m-d H:i:s'); ?></h4>    

                                <p class="card-title-desc">Jadwal Kapal Terbaru</p>
                                <a href="<?php echo base_url('schedule-add'); ?>" class="btn btn-primary btn-rounded waves-effect waves-light">Tambah</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle mb-0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kapal</th>
                                                <th>Tanggal Tiba</th>
                                                <th>Jam Tiba</th>
                                                <th>Tanggal Berangkat</th>
                                                <th>Jam Berangkat</th>
                                                <th>Keterangan</th> 
                                                <th>Aksi</th>    
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($schedules as $key => $schedule): ?>
                                            <tr>
                                                <th scope="row"><?= $key+1 ?></th>
                                                <td><?= $schedule['ship_name'] ?></td>
                                                <td><?= $schedule['arrived_date'] ?></td>
                                                <td><?= $schedule['arrived_time'] ?></td>
                                                <td><?= $schedule['departure_date'] ?></td>
                                                <td><?= $schedule['departure_time'] ?></td>
                                                <td><?= $schedule['status'] ?></td>
                                                <td>
                                                    <a class="btn btn-light btn-sm alert_notif" href="<?= base_url('/schedule/delete').'/'.$schedule['schedule_id'] ?>" >Hapus</a>
                                                    <a class="btn btn-light btn-sm" href="<?= base_url('/schedule/edit').'/'.$schedule['schedule_id'] ?>" >Edit</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end card body -->
                </div>
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © Minia.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by <a href="#!" class="text-decoration-underline">Themesbrand</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?= $this->include('partials/right-sidebar') ?>

<!-- JAVASCRIPT -->
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/feather-icons/feather.min.js"></script>
<!-- pace js -->
<script src="assets/libs/pace-js/pace.min.js"></script>

<script src="assets/js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
<script>
    $('.alert_notif').on('click',function(){
        var getLink = $(this).attr('href');
        Swal.fire({
            title: "Yakin hapus data?",            
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonColor: '#3085d6',
            cancelButtonText: "Batal"
                
        }).then(result => {
                    //jika klik ya maka arahkan ke proses.php
            if(result.isConfirmed){
                window.location.href = getLink
                }
            })
        return false;
    });
</script>



</body>

</html>