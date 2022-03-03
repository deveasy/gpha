
<?php
    if(isset($location_name)){
        $data = array('title'=>$location_name.'Consumables');
    }
    else{
        $data = array('title'=>'Consumables');
    }
    $this->load->view('tpl/side_top',$data);
?>
            
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Consumables</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.header row -->
                <div class="row">
                    <div class="col-log-12">
                        <?php 
                            if($this->session->flashdata('consumable_update')){
                                echo '<div class="alert alert-success" role="alert" id="pro-update-success">';
                                    echo '<strong>'.$this->session->flashdata('consumable_update').'</strong>';
                                echo '</div>';
                            }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Consumables
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                
                                <a href="<?php echo base_url().'index.php/consumables/new_consumable/'; ?>" class="btn btn-primary pull-right">+ Add New</a>
                                <p>&nbsp;</p>

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#consumables" data-toggle="tab">Consumables</a>
                                    </li>
                                    <li>
                                        <a href="#issued" data-toggle="tab">Issued Consumables</a>
                                    </li>
                                    <li>
                                        <a href="#quantity" data-toggle="tab">Quantity Received From Suppliers</a>
                                    </li>
                                    <li>
                                        <a href="#disposal" data-toggle="tab">Consumable Disposal</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="consumables">
                                        <p>&nbsp;</p>
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="consumables-table">
                                            <thead>
                                                <tr>
                                                    <th>Consumable</th>
                                                    <th>Unit</th>
                                                    <th>Quantity</th>
                                                    <th>Date Created</th>
                                                    <th>Created by</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(isset($consumables) && !empty($consumables)): ?>
                                                    <?php foreach($consumables as $consumable): ?>
                                                <tr>
                                                    <td><?php echo $consumable->consumable_category ?></td>
                                                    <td><?php echo $consumable->unit ?></td>
                                                    <td><?php echo $consumable->quantity ?></td>
                                                    <td><?php echo $consumable->date_created ?></td>
                                                    <td><?php echo $consumable->created_by ?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-primary dropdown-toggle" type="button" id="consumablesDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                Action
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="consumablesDropdownMenu">
                                                                <li><a href="#">Assign</a></li>
                                                                <li><a href="#">Remove</a></li>
                                                                <li><a href="#">Delete</a></li>
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
                                    <div class="tab-pane fade" id="issued">
                                        <p>&nbsp;</p>
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="issued-table">
                                            <thead>
                                                <tr>
                                                    <th>Consumable</th>
                                                    <th>Quantity</th>
                                                    <th>Receiving Staff</th>
                                                    <th>Unit</th>
                                                    <th>Department</th>
                                                    <th>Date Assigned</th>
                                                    <th>Assigned By</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(isset($available_consumables) && !empty($available_consumables)): ?>
                                                    <?php foreach($available_consumables as $consumable): ?>
                                                <tr>
                                                    <td><?php echo $consumable->consumable ?></td>
                                                    <td><?php echo $consumable->quantity ?></td>
                                                    <td><?php echo $consumable->received_by ?></td>
                                                    <td><?php echo $consumable->unit ?></td>
                                                    <td><?php echo $consumable->department ?></td>
                                                    <td><?php echo $consumable->date_assigned ?></td>
                                                    <td><?php echo $consumable->assigned_by ?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-primary dropdown-toggle" type="button" id="issuedDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                Action
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="issuedDropdownMenu">
                                                                <li><a href="<?php echo base_url() . 'index.php/consumables/assign_consumable/'.$consumable->consumable_id; ?>">Dispose</a></li>
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
                                    <div class="tab-pane fade" id="quantity">
                                        <p>&nbsp;</p>
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="quantity-table">
                                            <thead>
                                                <tr>
                                                    <th>Consumable</th>
                                                    <th>Quantity</th>
                                                    <th>Unit</th>
                                                    <th>Supplier</th>
                                                    <th>Date Created</th>
                                                    <th>Created By</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(isset($assigned_consumables) && !empty($assigned_consumables)): ?>
                                                    <?php foreach($assigned_consumables as $consumable): ?>
                                                <tr>
                                                    <td><?php echo $consumable->consumable ?></td>
                                                    <td><?php echo $consumable->quantity ?></td>
                                                    <td><?php echo $consumable->unit ?></td>
                                                    <td><?php echo $consumable->supplier ?></td>
                                                    <td><?php echo $consumable->date_created ?></td>
                                                    <td><?php echo $consumable->created_by ?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-primary dropdown-toggle" type="button" id="quantityDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                Action
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="quantityDropdownMenu">
                                                                <li><a href="#">Edit</a></li>
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
                                    <div class="tab-pane fade" id="disposal">
                                        <p>&nbsp;</p>
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="disposal-table">
                                            <thead>
                                                <tr>
                                                    <th>Consumable Category</th>
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
                                                <?php if(isset($faulty_consumables) && !empty($faulty_consumables)): ?>
                                                    <?php foreach($faulty_consumables as $consumable): ?>
                                                <tr>
                                                    <td><?php echo $consumable->consumable_category ?></td>
                                                    <td><?php echo $consumable->brand ?></td>
                                                    <td><?php echo $consumable->serial_number ?></td>
                                                    <td><?php echo $consumable->location ?></td>
                                                    <td><?php echo $consumable->supplier_name ?></td>
                                                    <td><?php echo $consumable->warranty_date ?></td>
                                                    <td><?php echo $consumable->date_created ?></td>
                                                    <td><?php echo $consumable->created_by ?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-primary dropdown-toggle" type="button" id="disposalDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                Action
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="disposalDropdownMenu">
                                                                <li><a href="#">Edit</a></li>
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
            </div>
            <!-- /#page-wrapper -->

<?php $this->load->view('tpl/foot');