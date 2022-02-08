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
                                <div class="col-lg-6 col-md-6">
                                    <?php
                                        $attributes = array('role'=>'form');
                                        echo form_open_multipart('assets/add_asset'); 
                                    ?>
                                        <div class="form-group">
                                            <label>Serial Number</label>
                                            <input class="form-control" name="serial_number" placeholder="Serial Number" value="<?php echo set_value('serial_number'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Asset Name</label>
                                            <input class="form-control" name="asset_name" placeholder="Enter Asset Name" value="<?php echo set_value('asset_name'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Asset Image</label>
                                            <input type="file" name="asset_image">
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="asset_category">
                                                <option value="">Select Category</option>
                                                <?php
                                                    foreach($categories as $category){
                                                        echo '<option value="'.$category->category_name.'">'.$category->category_name.'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->

                                <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Asset Description</label>
                                            <textarea class="form-control" rows="4" name="description"><?php echo set_value('description'); ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Re-Order Level</label>
                                            <input class="form-control" name="reorder_level" placeholder="Enter re-order level" value="<?php echo set_value('reorder_level'); ?>">
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                    </form>
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

<?php $this->load->view('tpl/foot');