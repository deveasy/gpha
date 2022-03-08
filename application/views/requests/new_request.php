<?php
    $data = array('title'=>'Request for Asset');
    $this->load->view('tpl/side_top',$data);
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Request for Asset </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Request for Asset
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php echo validation_errors(); ?>
                                <div class="col-lg-6 col-md-6">
                                    <?php
                                        $attributes = array('id'=>'requestAssetForm');
                                        echo form_open_multipart('requests/add_request/', $attributes); 
                                    ?>
                                        <div class="form-group">
                                            <label class="radio-inline">
                                                <input type="radio" name="requestType" value="Asset">Asset
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="requestType" value="Consumable">Consumable
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="consumable" id="consumable" required>
                                                <option value="">----Select Asset----</option>
                                                <?php
                                                    if(isset($asset_types)){
                                                        foreach($asset_types as $asset){
                                                            echo '<option value="'.$asset->asset_type_id.'">'.$asset->type_name.'</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="text" class="form-control" id="quantiity" name="quantity" placeholder="Enter Quantity" value="<?php echo set_value('wirelessMac'); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Request From Unit</label>
                                            <select class="form-control" name="supplier" id="supplier" required>
                                                <option value="">----Select Unit----</option>
                                                <?php
                                                    if(isset($categories)){
                                                        foreach($categories as $category){
                                                            echo '<option value="'.$category->category_id.'">'.$category->category_name.'</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <button class="btn btn-primary pull-right" id="addAsset" name="addAsset" type="submit">Submit</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->

                                <div class="col-lg-6 col-md-6">
                                        &nbsp;
                                </div>
                                <!-- /.col-lg-6 (nested) -->
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