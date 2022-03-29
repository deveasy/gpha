<?php
    $data = array('title'=>'Assign Asset');
    $this->load->view('tpl/side_top',$data);
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Assign Asset</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Assign to staff
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php echo validation_errors(); ?>
                                <div class="col-lg-6 col-md-6">
                                    <?php
                                        $attributes = array('id'=>'assignAssetForm');
                                        echo form_open_multipart('assets/assign_asset/'.$asset_type.'/'.$asset_id, $attributes); 
                                    ?>
                                        <div class="form-group">
                                            <label>Select Staff</label>
                                            <select class="form-control" name="staff" id="staff" required>
                                                <option value="">---- Select Staff ----</option>
                                                <?php
                                                    if(isset($users)){
                                                        foreach($users as $user){
                                                            echo '<option value="'.$user->user_id.'">'.$user->user_name.'</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Computer Tag Name</label>
                                            <input type="text" class="form-control" id="computerTag" name="computerTag" placeholder="Enter Computer Tag Name" value="<?php echo set_value('wirelessMac'); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Asset Tag Name</label>
                                            <input type="text" class="form-control" id="assetTag" name="assetTag" placeholder="Enter Asset Tag Name" value="<?php echo set_value('wirelessMac'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Asset Barcode</label>
                                            <input type="text" class="form-control" id="barcode" name="barcode" placeholder="Enter Barcode" value="<?php echo set_value('wirelessMac'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input type="date" class="form-control" id="date" name="date" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Location</label>
                                            <select class="form-control" name="location" id="location" required>
                                                <option value="">---- Select Location ----</option>
                                                <?php
                                                    if(isset($locations)){
                                                        foreach($locations as $location){
                                                            echo '<option value="'.$location->location_id.'">'.$location->location_name.'</option>';
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

<?php $this->load->view('tpl/foot');