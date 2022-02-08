
<?php
    if(isset($location_name)){
        $data = array('title'=>$location_name.'Assets');
    }
    else{
        $data = array('title'=>'Assets');
    }
    $this->load->view('tpl/side_top',$data);
?>
            

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Assets</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /. header row -->
            <!-- buttons row -->
            <div class="row buttons-row">
                <div class="col-lg-6">
                    <a href="<?php echo base_url(); ?>index.php/assets/new_asset" class="btn btn-primary">+ Add Asset</a>
                    <a href="<?php echo base_url(); ?>index.php/assets/new_category" class="btn btn-primary">+ Add Category</a>
                </div>
                <div class="col-lg-6">
                    <?php
                        $attributes = array('class'=>'form-inline');
                        echo form_open('assets/location_assets', $attributes);
                    ?>
                        <div class="form-group">
                            <label>Select Location:</label>
                            <select class="form-control" name="location" onchange="this.form.submit()">
                                <option> - Select - </option>
                                <option value="all">All Locations</option>
                                <?php
                                    foreach ($locations as $location) {
                                        echo '<option value="'.$location->location_id.'">'.$location->location_name.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /. buttons row -->
            <div class="row">
                <div class="col-lg-12">
                    <?php 
                        if($this->session->flashdata('asset_update')){
                            echo '<div class="alert alert-success" role="alert" id="pro-update-success">';
                                echo '<strong>'.$this->session->flashdata('asset_update').'</strong>';
                            echo '</div>';
                        }
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Assets
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Asset Category</th>
                                        <th>Brand</th>
                                        <th>Serial</th>
                                        <th>Unit</th>
                                        <th>Supplier</th>
                                        <th>Status</th>
                                        <th>Waranty Date</th>
                                        <th>Years After Purchase</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($assets) && !empty($assets)): ?>
                                        <?php foreach($assets as $asset): ?>
                                    <tr>
                                        <td><?php echo $asset->asset_category ?></td>
                                        <td><?php echo $asset->brand ?></td>
                                        <td><?php echo $asset->serial_number ?></td>
                                        <td><?php echo $asset->location_name ?></td>
                                        <td><?php echo $asset->supplier_name ?></td>
                                        <td><?php echo $asset->status ?></td>
                                        <td><?php echo $asset->waranty_date ?></td>
                                        <td><?php echo $asset->purchase_year ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    Dropdown
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                    <li><a href="#">Edit</a></li>
                                                    <li><a href="#">Release to Supplier</a></li>
                                                    <li><a href="#">Delete</a></li>
                                                    <li><a href="#">History</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-9 -->
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->

<?php $this->load->view('tpl/foot');