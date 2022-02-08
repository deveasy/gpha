
<?php
    $data = array('title'=>'Staff Management');
    $this->load->view('tpl/side_top',$data);
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Staff Management <a href="#add-new-staff" class="btn btn-primary">+ Add New Staff</a> </h1>
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
                            <?php echo form_open('staff/add_staff'); ?>
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="firstname" placeholder="Enter first name">
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="lastname" placeholder="Enter last name">
                            </div>
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" class="form-control" name="dob">
                            </div>
                            <div class="form-group">
                                <label>Staff Role</label>
                                <select class="form-control" name="role">
                                    <option></option>
                                    <?php
                                        if(!empty($roles)){
                                            foreach($roles as $role){
                                                echo '<option value="'.$role->role_id.'">'.$role->role_name.'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="genderMale" value="Male" checked>Male
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="genderFemale" value="Female">Female
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Shop</label>
                                <select class="form-control" name="shop">
                                    <option></option>
                                    <?php
                                        if(!empty($shops)){
                                            foreach($shops as $shop){
                                                echo '<option value="'.$shop->shop_id.'">'.$shop->shop_name.'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nationality</label>
                                <input type="text" class="form-control" name="nationality" placeholder="Enter nationality">
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" name="city" placeholder="Enter city">
                            </div>
                            <div class="form-group">
                                <label>Mobile Phone</label>
                                <input type="text" class="form-control" name="mobile_phone" placeholder="Enter mobile phone number">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter password">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit_staff">Submit</button>
                            </form>
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