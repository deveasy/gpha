<?php
    $data = array('title'=>'Add Asset');
    $this->load->view('tpl/side_top',$data);
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Asset <a href="<?php echo base_url(); ?>index.php/assets" class="btn btn-primary">View All Assets</a> <a href="#" class="btn btn-default">Import Assets</a></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New Asset
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php echo validation_errors(); ?>
                                <div class="col-lg-4 col-md-4">
                                    <?php
                                        $attributes = array('role'=>'form');
                                        echo form_open_multipart('assets/add_asset'); 
                                    ?>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="assetCategory" id="assetCategory">
                                                <option value="">----Select Category----</option>
                                                <?php
                                                    foreach($categories as $category){
                                                        echo '<option value="'.$category->category_id.'">'.$category->category_name.'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Wireless Mac Address</label>
                                            <input type="text" class="form-control" id="wirelessMac" name="wirelessMac" placeholder="Wireless Mac Address" value="<?php echo set_value('wireless_mac'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Hard Disk</label>
                                            <input type="text" class="form-control" id="hardDisk" name="hardDisk" placeholder="Hard Disk" value="<?php echo set_value('hard_disk'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Network Hubs</label>
                                            <input type="text" class="form-control" id="networkHub" name="networkHub" placeholder="Network Hubs" value="<?php echo set_value('network_hub'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Warranty Date</label>
                                            <input type="date" class="form-control" id="warrantyDate" name="warrantyDate" value="<?php echo set_value('warranty_date'); ?>">
                                        </div>
                                </div>
                                <!-- /.col-lg-4 (nested) -->

                                <div class="col-lg-4 col-md-4">
                                        <div class="form-group">
                                            <label>Select Brand</label>
                                            <select class="form-control" id="brand" name="brand" disabled>
                                                <option value="">----Select Brand----</option>
                                                <?php
                                                    foreach($brands as $brand){
                                                        echo '<option value="'.$brand->brand_id.'">'.$brand->brand_name.'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Lan Mac Address</label>
                                            <input type="text" class="form-control" id="lanMac" name="lanMac" placeholder="Lan Mac Address" value="<?php echo set_value('lan_mac'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Processor Speed</label>
                                            <input type="text" class="form-control" id="processor" name="processor" placeholder="Processor Speed" value="<?php echo set_value('processor'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Serial No.</label>
                                            <input type="text" class="form-control" id="serialNumber" name="serialNumber" placeholder="Serial Number" value="<?php echo set_value('processor'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Select Supplier</label>
                                            <select class="form-control" id="supplier" name="supplier">
                                                <option value="">----Select Supplier----</option>
                                                <?php
                                                    foreach($suppliers as $supplier){
                                                        echo '<option value="'.$supplier->supplier_id.'">'.$supplier->supplier_name.'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                </div>
                                <!-- /.col-lg-4 (nested) -->

                                <div class="col-lg-4 col-md-4">
                                        <div class="form-group">
                                            <label>Select Model</label>
                                            <select class="form-control" id="model" name="model" disabled>
                                                <option value="">----Select Model----</option>
                                                <?php
                                                    foreach($models as $model){
                                                        echo '<option value="'.$model->model_id.'">'.$model->model_name.'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Operating System</label>
                                            <input type="text" class="form-control" id="os" name="os" placeholder="Operating System" value="<?php echo set_value('os'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Memory</label>
                                            <input type="text" class="form-control" id="memory" name="memory" placeholder="Memory" value="<?php echo set_value('memory'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Colour</label>
                                            <input type="text" class="form-control" id="colour" name="colour" placeholder=Colour" value="<?php echo set_value('colour'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Purchase Date</label>
                                            <input type="date" class="form-control" id="purchaseDate" name="purchaseDate" value="<?php echo set_value('purchaseDate'); ?>">
                                        </div>
                                        <button class="btn btn-primary pull-right" id="addAsset" name="addAsset" type="submit">Submit</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
        <script>
            var base_url = "<?php echo base_url(); ?>";

            $(document).ready(function(){
                $("#lanMac").autocomplete({
                    source: function(request, response){
                        $.ajax({
                            url: base_url + "index.php/assets/search",
                            data: {
                                term: request.term
                            },
                            dataType: "json",
                            success: function(data){
                                var resp = $.map(data, function(obj){
                                    return obj.name;
                                });
                                response(resp);
                            }
                        });
                    },
                    minLength: 1
                });
            });
        </script>

<?php $this->load->view('tpl/foot');