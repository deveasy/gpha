
<?php
    $name = str_replace('%20', ' ', $shop_name);
    $data = array('title'=>$name . ' Inventory');
    $this->load->view('tpl/side_top',$data);
?>
            

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $name; ?> Inventory </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row buttons-row">
                <div class="col-lg-12">
                    <div class="btn-group" role="group">
                        <a href="<?php echo base_url(); ?>index.php/inventory/reset_shop_inventory/<?php echo $shop_id . '/' . $name; ?>" class="btn btn-primary">Reset Inventory</a> 
                        <a href="<?php echo base_url(); ?>index.php/inventory/transfer_products/<?php echo $shop_id . '/' . $name;  ?>" class="btn btn-primary">Transfer Products</a> 
                        <a href="<?php echo base_url(); ?>index.php/inventory/product_transfers/<?php echo $shop_id . '/' . $name; ?>" class="btn btn-primary">View Transferred Products</a>
                        <a href="<?php echo base_url(); ?>index.php/inventory/print_stock_sheets/<?php echo $shop_id . '/'. $name; ?>" class="btn btn-primary">Print Stock Sheets</a>
                        <a href="<?php echo base_url(); ?>index.php/inventory/import_products_shop/<?php echo $shop_id . '/'. $name; ?>" class="btn btn-primary">Import Products</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <?php 
                        if($this->session->flashdata('transfer')){
                            echo '<div class="alert alert-success" role="alert" id="pro-update-success">';
                                echo '<strong>'.$this->session->flashdata('transfer').'</strong>';
                            echo '</div>';
                        }
                    ?>
                    <?php
                    if($this->session->flashdata('product_import')){
                        echo '<div class="alert alert-success" role="alert" id="pro-update-success">';
                        echo '<strong>'.$this->session->flashdata('product_import').'</strong>';
                        echo '</div>';
                    }
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Shop Products
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Unit Price</th>
                                        <th>Available Quanity</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(!empty($products)){
                                            foreach($products as $product){
                                                echo '<tr>';
                                                echo '<td>'.$product->product_name.'</td>';
                                                echo '<td>'.$product->unit_price.'</td>';
                                                echo '<td>'.$product->quantity_in_stock.'</td>';
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
                <!-- /.col-lg-7 -->
            </div>
            
        </div>
        <!-- /#page-wrapper -->

<?php $this->load->view('tpl/foot');