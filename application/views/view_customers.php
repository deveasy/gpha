
<?php
    $data = array('title'=>'Staff Management');
    $this->load->view('tpl/side_top',$data);
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Customer Management <a href="#add-new-staff" class="btn btn-primary">+ Add New Customer</a> </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Customers
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Role</th>
                                        <th>Mobile Phone</th>
                                        <th>Username</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(!empty($staffs)){
                                            foreach($staffs as $staff){
                                                echo '<tr id="'.$staff->staff_id.'">';
                                                echo '<td>'.$staff->firstname.'</td>';
                                                echo '<td>'.$staff->lastname.'</td>';
                                                echo '<td>'.$staff->role_name.'</td>';
                                                echo '<td>'.$staff->mobile_phone.'</td>';
                                                echo '<td>'.$staff->username.'</td>';
                                                echo '<td>
                                                        <a href=""><i class="fa fa-gear" title="edit"></i></a> &nbsp;&nbsp;
                                                        <a href="#"><i class="fa fa-trash-o delete-staff" title="delete"></i></a>
                                                    </td>';
                                                echo '</tr>';
                                            }
                                        }
                                    ?>
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
            <div class="row">
                <div class="col-lg-12"><h1>Add New Customer</h1></div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

<?php $this->load->view('tpl/foot');