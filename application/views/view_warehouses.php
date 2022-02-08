
<?php
    $session_data = $this->session->userdata('logged_in');
    $role = $session_data['role'];

    $data = array('title'=>'All Warehouses');
    $this->load->view('tpl/side_top',$data);
?>
            

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">All Warehouses</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                <?php if(!empty($warehouses)): ?>
                <?php foreach($warehouses as $warehouse): ?>
                    <div class="item">
                        <div class="item-heading">
                            <a href="#"><h1>AM</h1></a>
                        </div>
                        <div class="item-body">
                            <a href="<?php echo base_url(); ?>index.php/inventory/warehouse_inventory/<?php echo $warehouse->warehouse_id .'/'. $warehouse->warehouse_name; ?>"><p><?php echo $warehouse->warehouse_name; ?></p></a>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php endif; ?> 
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php if($role == 1 || $role == 2): ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="item new-item">
                        <div class="item-heading">
                            <a href="#"><h1><i class="fa fa-plus fa-fw"></i></h1></a>
                        </div>
                        <div class="item-body">
                            <a href="#"><p>ADD NEW WAREHOUSE</p></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <!-- /#page-wrapper -->

<?php $this->load->view('tpl/foot');