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
                                <h4 class="card-title">Tabel Operasional</h4>
                                <p class="card-title-desc">Operasional</p>
                                <div class="col-lg-6">
                                    <div class="mt-3 mt-lg-0">
                                        <form action="<?php echo base_url('/operation-find'); ?>" method="POST">
                                            <div class="mb-3">    
                                                <label class="form-label">Cari Data </label>
                                                <select class="form-select" name="month">
                                                    <option <?php if($date=='1') echo "selected"?> value="1" >Januari</option>
                                                    <option <?php if($date=='2') echo "selected"?> value="2" >Februari</option>
                                                    <option <?php if($date=='3') echo "selected"?> value="3" >Maret</option>
                                                    <option <?php if($date=='4') echo "selected"?> value="4" >April</option>
                                                    <option <?php if($date=='5') echo "selected"?> value="5" >Mei</option>
                                                    <option <?php if($date=='6') echo "selected"?> value="6" >Juni</option>
                                                    <option <?php if($date=='7') echo "selected"?> value="7" >Juli</option>
                                                    <option <?php if($date=='8') echo "selected"?> value="8" >Agustus</option>
                                                    <option <?php if($date=='9') echo "selected"?> value="9" >September</option>
                                                    <option <?php if($date=='10') echo "selected"?> value="10" >Oktober</option>
                                                    <option <?php if($date=='11') echo "selected"?> value="11" >November</option>
                                                    <option <?php if($date=='12') echo "selected"?> value="12" >Desember</option>


                                                </select>
                                                <select class="form-select" name="year">
                                                    <option value="2023">2023</option>
                                                </select>
                                            </div>    
                                            <div class="mb-3">
                                                <input type="submit" class="btn btn-primary btn-rounded waves-effect waves-light" name="mysubmit" value="Cari"  />
                                            </div>            
                                        </form>
                                        <div class="mb-3">
                                            <a href="<?php echo base_url('operation-add'); ?>" class="btn btn-primary btn-rounded waves-effect waves-light">Tambah</a>
                                            <a href="<?php echo base_url('operation-download/'.$date.'/'.$year); ?>" class="btn btn-primary btn-rounded waves-effect waves-light">Download</a>
                                        </div>  
                                    </div>
                                </div>
                                 
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle mb-0">
                                        <thead>
                                            <tr>
                                                <td rowspan="2" >No</td>
                                                <td rowspan="2" >Jenis Pelayaran</td>
                                                <td rowspan="2">Nama Kapal</td>
                                                <td rowspan="2">Agen</td>
                                                <td rowspan="2">Tanggal Tiba</td>
                                                <td rowspan="2">Jam Tiba</td>
                                                <td rowspan="2">Asal</td>
                                                <td rowspan="2">Tanggal Berangkat</td>
                                                <td rowspan="2">Jam Berangkat</td>
                                                <td rowspan="2">Tujuan</td>
                                                <td colspan="3">Muat</td>
                                                <td colspan="3">Bongkar</td>
                                                <td rowspan="2" >Penumpang Naik</td>
                                                <td rowspan="2">Penumpang Turun</td>
                                                <td rowspan="2">Keterangan</td> 
                                                <td rowspan="2">Aksi</td>    
                                            </tr>
                                            <tr>
                                                <td>Kommoditas</td>
                                                <td>Jumlah</td>
                                                <td>Kemasan</td>
                                                <td>Kommoditas</td>
                                                <td>Jumlah</td>
                                                <td>Kemasan</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($operations as $key => $operation): ?>
                                            <tr>
                                                <th scope="row"><?= $key+1 ?></th>
                                                <td><?= $operation['cruise_type'] ?></td>
                                                <td><?= $operation['ship_name'] ?></td>
                                                <td><?= $operation['agency_code'] ?></td>
                                                <td><?= $operation['arrived_date'] ?></td>
                                                <td><?= $operation['arrived_time'] ?></td>
                                                <td><?= $operation['asal'] ?></td>
                                                <td><?= $operation['departure_date'] ?></td>
                                                <td><?= $operation['departure_time'] ?></td>
                                                <td><?= $operation['tujuan'] ?></td>
                                                <td><?= $operation['load_commodity'] ?></td>
                                                <td><?= $operation['load_qty'] ?></td>
                                                <td><?= $operation['load_type'] ?></td>
                                                <td><?= $operation['unload_commodity'] ?></td>
                                                <td><?= $operation['unload_qty'] ?></td>
                                                <td><?= $operation['unload_type'] ?></td>
                                                <td><?= $operation['p_get_on'] ?></td>
                                                <td><?= $operation['p_get_off'] ?></td>
                                                <td><?= $operation['status'] ?></td>
                                                <td>
                                                    <a class="btn btn-light btn-sm alert_notif" href="" >Hapus</a>
                                                    <a class="btn btn-light btn-sm" href="" >Edit</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- <div class="card-body">
                                <div>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="fallback">
                                            <input type="file" name="excel_file">
                                        </div>
                                        <div class="text-left mt-1">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Import Data</button>
                                        </div>    
                                    </form>
                                </div>
                            </div> -->
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