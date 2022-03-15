<?php
    $data = array('title'=>'Add Consumable');
    $this->load->view('tpl/side_top',$data);
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Consumable <a href="<?php echo base_url(); ?>index.php/assets" class="btn btn-primary">View All Assets</a> <a href="#" class="btn btn-default">Import Assets</a></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New Consumable
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php echo validation_errors(); ?>
                                <div class="col-lg-6 col-md-6">
                                    <?php
                                        $attributes = array('id'=>'addAssetForm');
                                        echo form_open_multipart('consumables/add_consumable/', $attributes); 
                                    ?>
                                        <div class="form-group">
                                            <label>Select Consumable</label>
                                            <select class="form-control" name="consumable" id="consumable" required>
                                                <option value="">----Select Category----</option>
                                                <?php
                                                    if(isset($categories)){
                                                        foreach($categories as $category){
                                                            echo '<option value="'.$category->category_id.'">'.$category->category_name.'</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Quantity</label>
                                            <input type="text" class="form-control" id="quantiity" name="quantiity" placeholder="Enter Quantity" value="<?php echo set_value('wirelessMac'); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Supplier</label>
                                            <select class="form-control" name="supplier" id="supplier" required>
                                                <option value="">----Select Supplier----</option>
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