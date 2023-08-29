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
            <form action="<?php echo base_url('/operation'); ?>" method="post">  
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <p class="card-title-desc">Data Kapal</p>
                            </div>
                            <div class="card-body p-4">
                                <div class="row">            
                                    <div class="col-lg-4 col-lg-6">
                                        <div class="mb-3">
                                            <label for="choices-single-default" class="form-label font-size-13 text-muted">Nama Kapal</label>
                                            <select class="form-control" data-trigger name="shipid" placeholder="Nama Kapal">
                                                <?php foreach($ships as $ship): ?>
                                                <option value="<?=$ship['ship_id']?>"><?=$ship['ship_type']?>. <?=$ship['ship_name']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>    
                                    <div class="col-lg-4 col-lg-6">
                                        <div class="mb-3">
                                            <label for="choices-single-default" class="form-label font-size-13 text-muted">Jenis Pelayaran</label>
                                            <select class="form-control" data-trigger name="cruiseid"  placeholder="Jenis Pelayaran">
                                                <?php foreach($cruises as $cruise): ?>
                                                <option value="<?=$cruise['cruise_id']?>"><?=$cruise['cruise_type']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="col-lg-4 col-lg-6">
                                        <div class="mb-3">
                                            <label for="choices-single-default" class="form-label font-size-13 text-muted">Nama Agen</label>
                                            <select class="form-control" data-trigger name="agencyid"  placeholder="Nama Agen">
                                                <?php foreach($agencies as $agency): ?>
                                                <option value="<?=$agency['agency_id']?>"><?=$agency['agency_code']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div> 
                                </div>     
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

                <!-- row -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <p class="card-title-desc">Kapal Tiba</p>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="example-date-input" class="form-label">Tanggal Tiba</label>
                                    <input class="form-control" name="datearrive" type="date" >
                                </div>
                                <div class="mb-3">
                                    <label for="example-time-input" class="form-label">Jam Tiba</label>
                                    <input class="form-control" name="timearrive" type="time" >
                                </div>
                                <div class="mb-3">
                                    <label for="choices-single-default" class="form-label font-size-13 text-muted">Asal</label>
                                    <select class="form-control" data-trigger name="origin"  placeholder="Pelabhan Asal">
                                    <?php foreach($ports as $port): ?>
                                        <option value="<?=$port['port_id']?>"><?=$port['port_name']?></option>
                                    <?php endforeach;?>
                                    </select>
                                </div>                                
                            </div>    
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <p class="card-title-desc">Kapal Berangkat</p>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="example-date-input" class="form-label">Tanggal Berangkat</label>
                                    <input class="form-control" name="datedepture" type="date" >
                                </div>
                                <div class="mb-3">
                                    <label for="example-time-input" class="form-label">Jam Berangkat</label>
                                    <input class="form-control" name="timedepture" type="time" >
                                </div>
                                <div class="mb-3">
                                    <label for="choices-single-default" class="form-label font-size-13 text-muted">Tujuan</label>
                                    <select class="form-control" data-trigger name="destination"  placeholder="Pelabuhan Tujuan">
                                    <?php foreach($ports as $port): ?>
                                        <option value="<?=$port['port_id']?>"><?=$port['port_name']?></option>
                                    <?php endforeach;?>
                                    </select>
                                </div> 
                                    </div>
                            </div> 
                        </div>    
                    <div>            
                </div>
                <!-- end row -->
                
                <!-- row -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <p class="card-title-desc">Muat</p>
                            </div>
                            <div class="card-body">
                                    <div div class="mb-3">
                                        <label for="example-text-input" class="form-label">Komuditas</label>
                                        <input type="text" id="domestic_load_commodity" class="form-control" placeholder="Komuditas" >
                                    </div>
                                    <div div class="mb-3">
                                        <label for="example-text-input" class="form-label">Jumlah</label>
                                        <input type="number" min=0 id="domestic_load_qty" class="form-control" placeholder="Jumlah" >
                                    </div>
                                    <div div class="mb-3">
                                        <label for="example-text-input" class="form-label">Jenis Kemasan</label>
                                        <input type="text" id="domestic_load_type" class="form-control" placeholder="Jenis Kemasan" >
                                    </div>
                                    <div div class="mb-3">
                                        <a id="add_domestic_load" class="btn btn-success btn-sm">Tambah</a>
                                    </div>
                                    <div class="mb-3">
                                        <table class="table_load_domestic" style="display:none;">
                                            <thead>
                                                <tr>
                                                    <th>Komoditi</th>
                                                    <th>Jumlah</th>
                                                    <th>Jenis Kemasan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="add_row_domestic_load" class="add_row_foreign_load">
                                            </tbody>
                                        </table>
                                    </div>
                            </div>   
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <p class="card-title-desc">Bongkar</p>
                            </div>
                            <div class="card-body">
                                    <div div class="mb-3">
                                        <label for="example-text-input" class="form-label">Komuditas</label>
                                        <input type="text" id="domestic_unload_commodity" class="form-control" placeholder="Komuditas" >
                                    </div>
                                    <div div class="mb-3">
                                        <label for="example-text-input" class="form-label">Jumlah</label>
                                        <input type="number" min=0 id="domestic_unload_qty" class="form-control" placeholder="Jumlah" >
                                    </div>
                                    <div div class="mb-3">
                                        <label for="example-text-input" class="form-label">Jenis Kemasan</label>
                                        <input type="text" id="domestic_unload_type" class="form-control" placeholder="Jenis Kemasan" >
                                    </div>
                                    <div div class="mb-3">
                                        <a id="add_domestic_unload" class="btn btn-success btn-sm">Tambah</a>
                                    </div>
                                    <div class="mb-3">
                                        <table class="table_unload_domestic" style="display:none;">
                                            <thead>
                                                <tr>
                                                    <th>Komoditi</th>
                                                    <th>Jumlah</th>
                                                    <th>Jenis Kemasan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        <tbody id="add_row_domestic_unload" class="add_row_foreign_unload">
                                            </tbody>
                                        </table>
                                    </div>
                            </div>   
                        </div>
                    </div>
                </div>
                 

                <!-- end row -->

                <!-- row -->
                <div class=row>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <p class="card-title-desc">Penumpang</p>
                            </div>
                            <div class="card-body">
                            <div class="mb-3">
                                    <label for="example-text-input" class="form-label">Penumpang Naik</label>
                                    <input class="form-control" name="pon" type="text" value="" >
                                </div>
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-label">Penumpan Turun</label>
                                    <input class="form-control" name="poff" type="text" value="" >
                                </div>
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-label">Status</label>
                                    <input class="form-control" name="status" type="text" value="" >
                                </div>
                            </div>
                         </div>    
                    </div>
                </div>                        

                <!-- row -->
                <div class=row>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary btn-rounded waves-effect waves-light" name="mysubmit" value="Masukkan Data"  />
                    </div>
                </div>
                <!-- end row -->
            </form>
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

<script src="assets/js/handlebars.min.js"></script>

<script id="document-template-domestic-load" type="text/x-handlebars-template">
        <tr id="delete_add_more_item_domestic_load">
            <td>
                <div class="mb-3">
                    <input type="text" name="domesticloadcommodity[]" value="{{domestic_load_commodity}}" >
                </div>
            </td>
            <td>
                <div class="mb-3">
                <input type="number" name="domesticloadqty[]" value="{{domestic_load_qty}}">
                </div>
            </td>
            <td>
                <div class="mb-3">
                    <input type="text" name="domesticloadtype[]" value="{{domestic_load_type}}" >
                </div>
            </td>
        
            <td>
            <i id="remove_domestic_load" style="cursor:pointer;color:red;">Remove</i>
            </td>
        </tr>
</script>


<script id="document-template-domestic-unload" type="text/x-handlebars-template">
        <tr id="delete_add_more_item_domestic_unload">
            <td>
                <div class="mb-3">
                    <input type="text" name="domesticunloadcommodity[]" value="{{domestic_unload_commodity}}" >
                </div>
            </td>
            <td>
                <div class="mb-3">
                <input type="number" name="domesticunloadqty[]" value="{{domestic_unload_qty}}">
                </div>
            </td>
            <td>
                <div class="mb-3">
                    <input type="text" name="domesticunloadtype[]" value="{{domestic_unload_type}}" >
                </div>
            </td>
        
            <td>
            <i id="remove_domestic_unload" style="cursor:pointer;color:red;">Remove</i>
            </td>
        </tr>
</script>

<script>
    $(document).on('click','#add_domestic_load',function(){
        $('.table_load_domestic').show();
        var domestic_load_commodity = $("#domestic_load_commodity").val();
        var domestic_load_qty = $("#domestic_load_qty").val();
        var domestic_load_type = $("#domestic_load_type").val();
        var source = $("#document-template-domestic-load").html();
        var template = Handlebars.compile(source);

        var data = {
            domestic_load_commodity: domestic_load_commodity,
            domestic_load_qty: domestic_load_qty,
            domestic_load_type :domestic_load_type
        }
        var html = template(data);
        $("#add_row_domestic_load").append(html)
    });
    $(document).on('click','#remove_domestic_load',function(event){
       $(this).closest('#delete_add_more_item_domestic_load').remove();
    });
</script>

<script>
    $(document).on('click','#add_domestic_unload',function(){
        $('.table_unload_domestic').show();
        var domestic_unload_commodity = $("#domestic_unload_commodity").val();
        var domestic_unload_qty = $("#domestic_unload_qty").val();
        var domestic_unload_type = $("#domestic_unload_type").val();
        var source = $("#document-template-domestic-unload").html();
        var template = Handlebars.compile(source);

        var data = {
            domestic_unload_commodity: domestic_unload_commodity,
            domestic_unload_qty: domestic_unload_qty,
            domestic_unload_type :domestic_unload_type
        }
        var html = template(data);
        $("#add_row_domestic_unload").append(html)
    });
    $(document).on('click','#remove_domestic_unload',function(event){
       $(this).closest('#delete_add_more_item_domestic_unload').remove();
    });
</script>


</body>

</html>