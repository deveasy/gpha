<?php
    $data = array('title'=>'Departments');
    $this->load->view('tpl/side_top',$data);
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Departments</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New Department
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php echo validation_errors(); ?>
                                <div class="col-lg-12 col-md-12">
                                    <?php
                                        $attributes = array('role'=>'form');
                                        echo form_open('admin/add_department'); 
                                    ?>
                                        <div class="form-group">
                                            <label>Department Name</label>
                                            <input class="form-control" name="department" placeholder="Enter Category Name" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>Location</label>
                                            <input class="form-control" name="location" placeholder="Enter Department Location" value="">
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-12 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 col-md-4 -->

                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Departments
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <?php
                                        if(!empty($departments)){
                                            foreach($departments as $department){
                                                echo '<tr>';
                                                    echo '<td><p><strong>'.$department->department_name.'</strong></p></td>';
                                                echo '</tr>';
                                            }
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?php $this->load->view('tpl/foot');