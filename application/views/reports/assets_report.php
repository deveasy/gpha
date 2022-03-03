
<?php
    if(isset($location_name)){
        $data = array('title'=>$location_name.'Assets');
    }
    else{
        $data = array('title'=>'Assets Report');
    }
    $this->load->view('tpl/side_top',$data);
?>
            
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Assets Report</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.header row -->
                <div class="row">
                    <div class="col-log-12">
                        <?php 
                            if($this->session->flashdata('asset_update')){
                                echo '<div class="alert alert-success" role="alert" id="pro-update-success">';
                                    echo '<strong>'.$this->session->flashdata('asset_update').'</strong>';
                                echo '</div>';
                            }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Asset Category
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <form class="form-inline">
                                    <div class="form-group">
                                        <label for="exampleInputName2">Name</label>
                                        <select class="form-control" id="asset-type" name="asset-type">
                                            <option>-- Select problem type --</option>
                                            <option>Software</option>
                                            <option>Network</option>
                                            <option>Hardware</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="staff">Asset Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option>-- Select Status --</option>
                                            <option>Assigned</option>
                                            <option>Available</option>
                                            <option>Discarded</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="staff">Asset Location</label>
                                        <select class="form-control" id="location" name="location">
                                            <option>Tema</option>
                                            <option>Headquarters</option>
                                            <option>Golden Jubilee Terminal</option>
                                            <option>Revenue Centre</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <table width="100%" class="table table-striped table-bordered table-hover" id="assets-report-table">
                                    <thead>
                                        <tr>
                                            <th>Asset Category</th>
                                            <th>Asset Type</th>
                                            <th>Brand</th>
                                            <th>Model</th>
                                            <th>Serial</th>
                                            <th>Wireless Mac Address</th>
                                            <th>Lan Mac Address</th>
                                            <th>Operating System</th>
                                            <th>Hard Drive</th>
                                            <th>Processor Speed</th>
                                            <th>Memory</th>
                                            <th>Location</th>
                                            <th>Department</th>
                                            <th>Staff</th>
                                            <th>Computer Tag Name</th>
                                            <th>Asset Tag Name</th>
                                            <th>Supplier</th>
                                            <th>Status</th>
                                            <th>Warrant Date</th>
                                            <th>Purchase Date</th>
                                            <th>Years After Purchase</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($assets) && !empty($assets)): ?>
                                            <?php foreach($assets as $asset): ?>
                                        <tr>
                                            <td><?php echo $asset->type_name ?></td>
                                            <td><?php echo $asset->brand ?></td>
                                            <td><?php echo $asset->serial_number ?></td>
                                            <td><?php echo $asset->location ?></td>
                                            <td><?php echo $asset->supplier_name ?></td>
                                            <td><?php echo $asset->status ?></td>
                                            <td><?php echo $asset->warranty_date ?></td>
                                            <td><?php echo $asset->purchase_date ?></td>
                                            <td><?php echo $asset->hard_drive ?></td>
                                            <td><?php echo $asset->hard_drive ?></td>
                                            <td><?php echo $asset->hard_drive ?></td>
                                            <td><?php echo $asset->hard_drive ?></td>
                                            <td><?php echo $asset->hard_drive ?></td>
                                            <td><?php echo $asset->hard_drive ?></td>
                                            <td><?php echo $asset->hard_drive ?></td>
                                            <td><?php echo $asset->hard_drive ?></td>
                                            <td><?php echo $asset->hard_drive ?></td>
                                            <td><?php echo $asset->hard_drive ?></td>
                                            <td><?php echo $asset->hard_drive ?></td>
                                            <td><?php echo $asset->hard_drive ?></td>
                                            <td><?php echo $asset->hard_drive ?></td>
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
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

<?php $this->load->view('tpl/foot');