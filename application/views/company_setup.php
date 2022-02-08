<?php
    $data = array('title'=>'Company Setup');
    $this->load->view('tpl/side_top',$data);
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Company Setup</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Company Information / Warehouse / Shop
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php echo validation_errors(); ?>
                                <div class="col-lg-6">
                                    <h2>Company Information</h2>
                                    <?php
                                        $attributes = array('role'=>'form');
                                        echo form_open_multipart('company/add_company'); 
                                    ?>
                                        <div class="form-group">
                                            <label>Company Name</label>
                                            <input class="form-control" name="company_name" placeholder="Enter Company Name" value="<?php echo set_value('product_code') ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Telephone</label>
                                            <input class="form-control" name="telephone" placeholder="Enter phone number" value="<?php echo set_value('telephone') ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input class="form-control" name="email" placeholder="Enter email address" value="<?php echo set_value('email') ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Website</label>
                                            <input class="form-control" name="website" placeholder="Enter website address" value="<?php echo set_value('website') ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Postal Address</label>
                                            <textarea class="form-control" rows="4" name="postal_address"><?php echo set_value('postal_address'); ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Headquarters</label>
                                            <input class="form-control" name="headquarters" placeholder="Enter re-order level" value="<?php echo set_value('headquarters'); ?>">
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="submit_company_info">Submit</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->

                                <!--- Second Column -->
                                <div class="col-lg-6">
                                <h2>Add New Warehouse</h2>
                                <?php
                                    $attributes = array('role'=>'form');
                                    echo form_open_multipart('company/add_warehouse'); 
                                ?>
                                    <div class="form-group">
                                        <label>Warehouse Name</label>
                                        <input type="text" class="form-control" name="warehouse_name" placeholder="Enter warehouse name">
                                    </div>
                                    <div class="form-group">
                                        <label>Warehouse Location</label>
                                        <input type="text" class="form-control" name="warehouse_location" placeholder="Enter warehouse location">
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="submit_warehouse">Submit</button>
                                </form>
                                <h2>Add New Shop</h2>
                                <?php
                                    $attributes = array('role'=>'form');
                                    echo form_open_multipart('company/add_shop'); 
                                ?>
                                    <div class="form-group">
                                        <label>Shop Name</label>
                                        <input type="text" class="form-control" name="shop_name" placeholder="Enter  shop name">
                                    </div>
                                    <div class="form-group">
                                        <label>Shop Location</label>
                                        <input type="text" class="form-control" name="shop_location" placeholder="Enter shop location">
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="submit_shop">Submit</button>
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
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?php $this->load->view('tpl/foot');