<?php
    $data = array('title'=>'Add Product');
    $this->load->view('tpl/side_top',$data);
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Location <a href="<?php echo base_url(); ?>index.php/products" class="btn btn-primary">View All Locations</a></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New Location
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php echo validation_errors(); ?>
                                <div class="col-lg-6 col-md-6">
                                    <?php
                                        $attributes = array('role'=>'form');
                                        echo form_open_multipart('products/add_product'); 
                                    ?>
                                        <div class="form-group">
                                            <label>Location Code</label>
                                            <input class="form-control" name="product_code" placeholder="Enter Product Code" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>Location Name</label>
                                            <input class="form-control" name="product_name" placeholder="Enter Product Name" value="<?php echo set_value('product_name') ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <select class="form-control" name="product_category">
                                                <?php
                                                    foreach($categories as $category){
                                                        echo '<option value="'.$category->category_name.'">'.$category->category_name.'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Product Description</label>
                                            <textarea class="form-control" rows="4" name="description"><?php echo set_value('description'); ?></textarea>
                                        </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->

                                <div class="col-lg-6 col-md-6">
                                        
                                        <div class="form-group">
                                            <label>Longitude</label>
                                            <input class="form-control" name="reorder_level" placeholder="Enter re-order level" value="<?php echo set_value('reorder_level'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Latitude</label>
                                            <input class="form-control" name="reorder_level" placeholder="Enter re-order level" value="<?php echo set_value('reorder_level'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Contact
                                            </label>
                                            <select class="form-control" name="add_option">
                                                <option value="all">All Shops</option>
                                                <?php 
                                                    foreach($shops as $shop){
                                                        echo '<option value="'.$shop->shop_id.'">'.$shop->shop_name.'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                        <button type="reset" class="btn btn-default" name="reset">Reset</button>
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