<?php
    $data = array('title'=>'Edit Asset');
    $this->load->view('tpl/side_top',$data);
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Asset <a href="<?php echo base_url(); ?>index.php/assets" class="btn btn-primary">View All Assets</a></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Asset
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php echo validation_errors(); ?>
                                <div class="col-lg-4 col-md-4">
                                    <?php
                                        $attributes = array('id'=>'addAssetForm');
                                        echo form_open_multipart('assets/update_asset/'.$asset_id.'/'.$asset_type, $attributes); 
                                    ?>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="assetCategory" id="assetCategory" required>
                                                <option value="">----Select Category----</option>
                                                    <?php if(isset($categories)): ?>
                                                        <?php foreach($categories as $category): ?>
                                                            <option value="<?php echo $category->asset_type_id ?>"<?php echo (($asset->asset_type == $category->asset_type_id) ? set_select('assetCategory', $category->asset_type_id, true) : set_select('assetCategory', $category->asset_type_id, false)); ?> ><?php echo $category->type_name ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Wireless Mac Address</label>
                                            <input type="text" class="form-control" id="wirelessMac" name="wirelessMac" placeholder="Wireless Mac Address" value="<?php echo set_value('wirelessMac', $asset->wireless_mac); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Hard Disk</label>
                                            <input type="text" class="form-control" id="hardDisk" name="hardDisk" placeholder="Hard Disk" value="<?php echo set_value('hardDisk', $asset->hard_disk); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Network Hubs</label>
                                            <input type="text" class="form-control" id="networkHub" name="networkHub" placeholder="Network Hubs" value="<?php echo set_value('networkHub', $asset->network_hub); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Warranty Date</label>
                                            <input type="date" class="form-control" id="warrantyDate" name="warrantyDate" value="<?php echo set_value('warrantyDate', $asset->warranty_date); ?>" required>
                                        </div>
                                </div>
                                <!-- /.col-lg-4 (nested) -->

                                <div class="col-lg-4 col-md-4">
                                        <div class="form-group">
                                            <label>Select Brand</label>
                                            <select class="form-control" id="brand" name="brand" disabled>
                                                <option value="">----Select Brand----</option>
                                                <?php
                                                    if(isset($brands)){
                                                        foreach($brands as $brand){
                                                            echo '<option value="'.$brand->brand_id.'" '.(($asset->asset_type == $category->asset_type_id) ? set_select('assetCategory', $category->asset_type_id, true) : set_select('assetCategory', $category->asset_type_id, false)).'>'.$brand->brand_name.'</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Lan Mac Address</label>
                                            <input type="text" class="form-control" id="lanMac" name="lanMac" placeholder="Lan Mac Address" value="<?php echo set_value('lanMac', $asset->lan_mac); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Processor Speed</label>
                                            <input type="text" class="form-control" id="processor" name="processor" placeholder="Processor Speed" value="<?php echo set_value('processor', $asset->processor); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Serial No.</label>
                                            <input type="text" class="form-control" id="serialNumber" name="serialNumber" placeholder="Serial Number" value="<?php echo set_value('serialNumber', $asset->serial_number); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Select Supplier</label>
                                            <select class="form-control" id="supplier" name="supplier" required>
                                                <option value="">----Select Supplier----</option>
                                                <?php
                                                    if(isset($suppliers)){
                                                        foreach($suppliers as $supplier){
                                                            echo '<option value="'.$supplier->supplier_id.'" '.(($asset->asset_type == $category->asset_type_id) ? set_select('assetCategory', $category->asset_type_id, true) : set_select('assetCategory', $category->asset_type_id, false)).'>'.$supplier->supplier_name.'</option>';
                                                        }
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
                                                    if(isset($models)){
                                                        foreach($models as $model){
                                                            echo '<option value="'.$model->model_id.'" '.(($asset->asset_type == $category->asset_type_id) ? set_select('assetCategory', $category->asset_type_id, true) : set_select('assetCategory', $category->asset_type_id, false)).'>'.$model->model_name.'</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Operating System</label>
                                            <input type="text" class="form-control" id="os" name="os" placeholder="Operating System" value="<?php echo set_value('os', $asset->os); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Memory</label>
                                            <input type="text" class="form-control" id="memory" name="memory" placeholder="Memory" value="<?php echo set_value('memory', $asset->memory); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Colour</label>
                                            <input type="text" class="form-control" id="colour" name="colour" placeholder=Colour" value="<?php echo set_value('colour', $asset->colour); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Purchase Date</label>
                                            <input type="date" class="form-control" id="purchaseDate" name="purchaseDate" value="<?php echo set_value('purchaseDate', $asset->purchase_date); ?>" required>
                                        </div>
                                        <button class="btn btn-primary pull-right" id="addAsset" name="addAsset" type="submit">Update</button>
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