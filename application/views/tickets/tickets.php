
<?php
    if(isset($shop_name)){
        $data = array('title'=>$shop_name.'Issues');
    }
    else{
        $data = array('title'=>'Issues');
    }
    $this->load->view('tpl/side_top',$data);
?>
            

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Issues &amp; Solutions <a href="<?php echo base_url() ?>index.php/tickets/new" class="btn btn-primary pull-right">+ Report a problem</a></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /. header row -->
            <div class="row">
                <div class="col-lg-12">
                    <?php 
                        if($this->session->flashdata('product_update')){
                            echo '<div class="alert alert-success" role="alert" id="pro-update-success">';
                                echo '<strong>'.$this->session->flashdata('product_update').'</strong>';
                            echo '</div>';
                        }
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Products
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Staff</th>
                                        <th>Unit</th>
                                        <th>Department</th>
                                        <th>Problem Type</th>
                                        <th>Problem Desc</th>
                                        <th>Date Reported</th>
                                        <th>Reported By</th>
                                        <th>Assigned To</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(isset($issues) && !empty($issues)): ?>
                                    <?php foreach($issues as $issue): ?>
                                        <tr>
                                            <td><?php echo $issue->product_name ?></td>
                                            <td><?php echo $issue->cost_price ?></td>
                                            <td><?php echo $issue->cost_price ?></td>
                                            <td><?php echo $issue->problem_type ?></td>
                                            <td><?php echo $issue->problem_description ?></td>
                                            <td><?php echo $issue->report_date ?></td>
                                            <td><?php echo $issue->reported_by ?></td>
                                            <td><?php echo $issue->assigned_to ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" id="assetsDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        Action
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="assetsDropdownMenu">
                                                        <li><a href="<?php echo base_url() ?>index.php/tickets/edit/">Edit</a></li>
                                                        <li><a href="<?php echo base_url() ?>index.php/tickets/solve/">Solve</a></li>
                                                        <li><a href="<?php echo base_url() ?>index.php/tickets/delete/">Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>';
                                        </tr>';
                                    <?php endforeach; ?>
                                <?php endif; ?>
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