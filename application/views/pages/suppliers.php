<?php
    $data = array('title'=>'Suppliers');
    $this->load->view('tpl/side_top',$data);
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Suppliers</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New Supplier
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php echo validation_errors(); ?>
                                <div class="col-lg-12 col-md-12">
                                    <?php
                                        $attributes = array('role'=>'form');
                                        echo form_open('admin/add_supplier'); 
                                    ?>
                                        <div class="form-group">
                                            <label>Supplier</label>
                                            <input class="form-control" name="supplier_name" placeholder="Enter Supplier Name" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>Contact Person</label>
                                            <input class="form-control" name="contact" placeholder="Enter Name of Contact Person" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input class="form-control" name="phone" placeholder="Enter Supplier Phone Number" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" placeholder="Enter Email Address" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" rows="4" name="address"></textarea>
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
                            All Suppliers
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <?php
                                        if(!empty($suppliers)){
                                            foreach($suppliers as $supplier){
                                                echo '<tr>';
                                                    echo '<td><p><strong>'.$supplier->supplier_name.'</strong></p></td>';
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