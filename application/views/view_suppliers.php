
<?php
$data = array('title'=>'Suppliers');
$this->load->view('tpl/side_top',$data);
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Suppliers <a href="#add-new-staff" class="btn btn-primary">+ Add Supplier</a> </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All Staff
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
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading" id="add-new-staff">
                    <strong>Add New Staff</strong>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <h3>Staff Details</h3>

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
        <div class="col-lg-6 col-md-6">
            <?php
            if(!empty($shops)){
                foreach($shops as $shop){
                    echo '<div class="panel panel-default">';
                    echo '<div class="panel-heading">';
                    echo $shop->shop_name.' Staff';
                    echo '</div>';
                    echo '<!-- /.panel-heading -->';
                    echo '<div class="panel-body">';
                    echo '<div class="table-responsive">';
                    echo '<table class="table table-striped">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>#</th>';
                    echo '<th>First Name</th>';
                    echo '<th>Last Name</th>';
                    echo '<th>Username</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    if(!empty($staffs)){
                        foreach($staffs as $staff){
                            if($shop->shop_id == $staff->staff_id){
                                echo '<tr>';
                                echo '<td>'.$staff->staff_id.'</td>';
                                echo '<td>'.$staff->firstname.'</td>';
                                echo '<td>'.$staff->lastname.'</td>';
                                echo '<td>'.$staff->username.'</td>';
                                echo '</tr>';
                            }
                        }
                    }
                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                    echo '<!-- /.table-responsive -->';
                    echo '</div>';
                    echo '<!-- /.panel-body -->';
                    echo '</div>';
                    echo '<!-- /.panel -->';
                }
            }
            else{
                echo '<div class="panel panel-default">';
                echo '<div class="panel-heading">';
                echo 'Staff members in shop';
                echo '</div>';
                echo '<!-- /.panel-heading -->';
                echo '<div class="panel-body">';
                echo '<div class="table-responsive">';
                echo '<table class="table table-striped">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>#</th>';
                echo '<th>First Name</th>';
                echo '<th>Last Name</th>';
                echo '<th>Username</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                echo '<tr>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '</tr>';
                echo '</tbody>';
                echo '</table>';
                echo '</div>';
                echo '<!-- /.table-responsive -->';
                echo '</div>';
                echo '<!-- /.panel-body -->';
                echo '</div>';
                echo '<!-- /.panel -->';
            }
            ?>

        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->

<?php $this->load->view('tpl/foot');