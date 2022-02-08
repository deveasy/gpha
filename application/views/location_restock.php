
<?php
    $data = array('title'=>'Warehouse Restock');
    $this->load->view('tpl/side_top',$data);
?>
            

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Warehouse Restock
                        <a href="<?php echo base_url(); ?>index.php/inventory/receive_products/<?php echo $warehouse_id . '/' . $warehouse_name; ?>" class="btn btn-primary">Receive New Stock</a>
                        <a href="<?php echo base_url(); ?>index.php/inventory/warehouse_inventory/<?php echo $warehouse_id . '/' . $warehouse_name; ?>" class="btn btn-primary">Back</a>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- div box to display success message -->
                    <div id="success-message"></div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Recently Received Stock</strong>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Restock ID</th>
                                        <th>Waybill #</th>
                                        <th>Supplier Name</th>
                                        <th>Received At</th>
                                        <th>Date Received</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(!empty($restock)){
                                            foreach($restock as $stock){
                                                echo '<tr id="'.$stock->restock_id.'">';
                                                echo '<td><a href="'. base_url() . 'index.php/inventory/view_warehouse_restock/'.$stock->restock_id.'/'.$warehouse_id.'/'.$warehouse_name.'" class="pro-trans">'.$stock->restock_id.'</a></td>';
                                                echo '<td>'.$stock->waybill_code.'</td>';
                                                echo '<td>'.$stock->supplier_name.'</td>';
                                                echo '<td>'.$stock->warehouse_name.'</td>';
                                                echo '<td>'.$stock->date_received.'</td>';
                                                echo '<td><a href="#"><i class="fa fa-gear"></i> </a> <a href="#"><i class="fa fa-trash-o delete-restock"></i> </a> </td>';
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
            
        </div>
        <!-- /#page-wrapper -->

<?php $this->load->view('tpl/foot');