
<?php
    $name = str_replace('%20', ' ', $warehouse_name);
    $data = array('title'=>$name . ' Inventory');
    $this->load->view('tpl/side_top',$data);
?>
            

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $name ?> Inventory</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row buttons-row">
                <div class="col-lg-12">
                    <div class="btn-group" role="group">
                        <a href="<?php echo base_url(); ?>index.php/inventory/transfer_products/<?php echo $warehouse_id . '/' . $warehouse_name; ?>" class="btn btn-primary">Transfer Products</a>
                        <a href="<?php echo base_url(); ?>index.php/inventory/product_transfers/<?php echo $warehouse_id . '/' . $warehouse_name; ?>" class="btn btn-success">View all Transfers</a>
                        <a href="<?php echo base_url(); ?>index.php/inventory/warehouse_restock/<?php echo $warehouse_id . '/' . $warehouse_name; ?>" class="btn btn-primary">Received Stock</a>
                        <a href="<?php echo base_url(); ?>index.php/inventory/update_warehouse_stock/<?php echo $warehouse_id . '/' . $warehouse_name; ?>" class="btn btn-primary">Update Stock</a> 
                        <a href="<?php echo base_url(); ?>index.php/inventory/new_warehouse_sales_order/<?php echo $warehouse_id. '/' . $warehouse_name; ?>" class="btn btn-primary">New Sale</a>
                        <a href="<?php echo base_url(); ?>index.php/inventory/warehouse_orders/<?php echo $warehouse_id.'/'.$warehouse_name; ?>" class="btn btn-primary">All Sales</a>
                        <a href="<?php echo base_url(); ?>index.php/inventory/import_products_warehouse/<?php echo $warehouse_id . '/' . $warehouse_name; ?>" class="btn btn-primary">Import Products</a>
                        <a href="<?php echo base_url(); ?>index.php/inventory/reset_warehouse_inventory/<?php echo $warehouse_id. '/' . $warehouse_name; ?>" class="btn btn-default">Reset Inventory</a>
                    </div>
                </div>
            </div>
            <!-- /.buttons row -->
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    if($this->session->flashdata('product_import')){
                        echo '<div class="alert alert-success" role="alert" id="pro-update-success">';
                        echo '<strong>'.$this->session->flashdata('product_import').'</strong>';
                        echo '</div>';
                    }
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Warehouse Products
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Product Code</th>
                                        <th>Product Name</th>
                                        <th>Re-Order Level</th>
                                        <th>Current Level</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(!empty($inventory)){
                                            foreach($inventory as $item){
                                                echo '<tr>';
                                                echo '<td>'.$item->product_code.'</td>';
                                                echo '<td>'.$item->product_name.'</td>';
                                                echo '<td>'.$item->reorder_level.'</td>';
                                                echo '<td>'.$item->current_level.'</td>';
                                                echo '<td></td>';
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