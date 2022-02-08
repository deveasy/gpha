
<?php
    $name = str_replace('%20', ' ', $source_name);
    $data = array('title'=>$name.' Product Transfers');
    $this->load->view('tpl/side_top',$data);
?>
            

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <?php echo $name; ?> Product Transfers
                        <a href="<?php echo base_url(); ?>index.php/inventory/transfer_products/<?php echo $source .'/'. $source_name ?>" class="btn btn-primary">+ New Transfer</a>
                        <a href="<?php echo base_url(); ?>index.php/inventory/warehouse_inventory/<?php echo $source .'/'. $source_name ?>" class="btn btn-primary">Back</a>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Product Transfers Done
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Invoice #</th>
                                        <th>Transfered From</th>
                                        <th>Transfered To</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(!empty($transfers)){
                                            foreach($transfers as $transfer){
                                                echo '<tr id="'.$transfer->transfer_id.'">';
                                                echo '<td><a href="'. base_url() . 'index.php/inventory/view_product_transfer/'.$transfer->transfer_id.'/'.$transfer->destination.'/'.$source_name.'/'.$source.'" class="pro-trans">'.$transfer->transfer_id.'</a></td>';
                                                echo '<td>' . $name . '</td>';
                                                echo '<td>' . $transfer->shop_name  . '</td>';
                                                echo '<td>' . $transfer->transfer_date . '</td>';
                                                echo '<td><a href="'.base_url().'index.php/inventory/view_product_transfer/'.$transfer->transfer_id.'/'.$transfer->destination.'/'.$source_name.'/'.$source.'"><i class="fa fa-gear" title="edit"></i></a> &nbsp;&nbsp;<a href="#"><i class="fa fa-trash-o delete-transfer" title="delete"></i> </a> </td>';
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