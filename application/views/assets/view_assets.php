
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
                                <?php echo $type_name; ?>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#assets" data-toggle="tab">Assets</a>
                                    </li>
                                    <li>
                                        <a href="#unassigned" data-toggle="tab">Unassigned Assets</a>
                                    </li>
                                    <li>
                                        <a href="#assigned" data-toggle="tab">Assigned Assets</a>
                                    </li>
                                    <li>
                                        <a href="#faulty" data-toggle="tab">Faulty</a>
                                    </li>
                                    <li>
                                        <a href="#discarded" data-toggle="tab">Discarded</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="assets">
                                        <p>&nbsp;</p>
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="assets-table">
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
                                                            <button class="btn btn-primary dropdown-toggle" type="button" id="assetsDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                Dropdown
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="assetsDropdownMenu">
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
                                    <div class="tab-pane fade" id="unassigned">
                                        <p>&nbsp;</p>
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="unassigned-table">
                                            <thead>
                                                <tr>
                                                    <th>Asset Category</th>
                                                    <th>Brand</th>
                                                    <th>Serial</th>
                                                    <th>Unit</th>
                                                    <th>Supplier</th>
                                                    <th>Status</th>
                                                    <th>Waranty Date</th>
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
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-primary dropdown-toggle" type="button" id="unassignedDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                Dropdown
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="unassignedDropdownMenu">
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
                                    <div class="tab-pane fade" id="assigned">
                                        <p>&nbsp;</p>
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="assigned-table">
                                            <thead>
                                                <tr>
                                                    <th>Asset Category</th>
                                                    <th>Tag Name</th>
                                                    <th>Serial No.</th>
                                                    <th>Staff No.</th>
                                                    <th>Staff Name</th>
                                                    <th>Unit</th>
                                                    <th>Department</th>
                                                    <th>Location</th>
                                                    <th>Date Assigned</th>
                                                    <th>No. of Days Assigned</th>
                                                    <th>Assigned By</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(isset($assets) && !empty($assets)): ?>
                                                    <?php foreach($assets as $asset): ?>
                                                <tr>
                                                    <td><?php echo $asset->asset_category ?></td>
                                                    <td><?php echo $asset->tag_name ?></td>
                                                    <td><?php echo $asset->serial_number ?></td>
                                                    <td><?php echo $asset->assigned_to ?></td>
                                                    <td><?php echo $asset->location_name ?></td>
                                                    <td><?php echo $asset->supplier_name ?></td>
                                                    <td><?php echo $asset->status ?></td>
                                                    <td><?php echo $asset->location ?></td>
                                                    <td><?php echo $asset->date_assigned ?></td>
                                                    <td><?php echo $asset->waranty_date ?></td>
                                                    <td><?php echo $asset->assigned_by ?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-primary dropdown-toggle" type="button" id="assignedDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                Dropdown
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="assignedDropdownMenu">
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
                                    <div class="tab-pane fade" id="faulty">
                                        <p>&nbsp;</p>
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="faulty-table">
                                            <thead>
                                                <tr>
                                                    <th>Asset Category</th>
                                                    <th>Brand</th>
                                                    <th>Serial</th>
                                                    <th>Unit</th>
                                                    <th>Supplier</th>
                                                    <th>Waranty Date</th>
                                                    <th>Date Created</th>
                                                    <th>Created by</th>
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
                                                    <td><?php echo $asset->location ?></td>
                                                    <td><?php echo $asset->supplier ?></td>
                                                    <td><?php echo $asset->waranty_date ?></td>
                                                    <td><?php echo $asset->date_created ?></td>
                                                    <td><?php echo $asset->created_by ?></td>
                                                    <td><?php echo $asset->purchase_year ?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-primary dropdown-toggle" type="button" id="faultyDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                Dropdown
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="faultyDropdownMenu">
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
                                    <div class="tab-pane fade" id="discarded">
                                        <p>&nbsp;</p>
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="discarded-table">
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
                                                            <button class="btn btn-primary dropdown-toggle" type="button" id="discardedDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                Dropdown
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="discardedDropdownMenu">
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
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="jumbotron">
                            <h1>Jumbotron</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing.</p>
                            <p><a class="btn btn-primary btn-lg" role="button">Learn more</a>
                            </p>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

<?php $this->load->view('tpl/foot');