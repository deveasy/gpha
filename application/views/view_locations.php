
<?php
    $data = array('title'=>'All Locations');
    $this->load->view('tpl/side_top',$data);
?>
            

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">All Locations</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row buttons-row">
                <div class="col-lg-12">
                    <div class="btn-group" role="group">
                        <a href="<?php echo base_url(); ?>index.php/inventory/transfer_products" class="btn btn-primary">Transfer Products</a> 
                        <a href="<?php echo base_url(); ?>index.php/inventory/location_restock" class="btn btn-default">Stock Receipt</a>
                    </div>
                </div>
            </div>
            <!-- buttons row -->
            <div class="row">
                <div class="col-lg-12">
                <?php if(!empty($locations)): ?>
                    <?php foreach($locations as $location): ?>
                    <?php
                        $name_char = substr($location->location_name, 0, 1);
                        $parts = explode(" ", $location->location_name);
                    ?>
                        <div class="item">
                            <div class="item-heading">
                                <a href="#"><h1><?php echo $name_char; ?></h1></a>
                            </div>
                            <div class="item-body">
                                <a href="#"><p><?php echo $location->location_name; ?></p></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="new-item">
                        <div class="item-heading">
                            <a href="#"><h1><i class="fa fa-plus fa-fw"></i></h1></a>
                        </div>
                        <div class="item-body">
                            <a href="<?php echo base_url(); ?>index.php/locations/new_location"><p>ADD NEW LOCATION</p></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->

<?php $this->load->view('tpl/foot');