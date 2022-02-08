
<?php
    $data = array('title'=>'View Warehouse Restock');
    $this->load->view('tpl/side_top',$data);
?>
            

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Restock #: <?php echo $stock->restock_id; ?>
                        <a href="<?php echo base_url(); ?>index.php/inventory/warehouse_restock/<?php echo $warehouse_id . '/' . $warehouse_name; ?>" class="btn btn-primary">View All Restocks</a>
                    </h1>
                    
                    
                     
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /. header row -->
            <div class="row">
                <!-- Print dropdown menu -->
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Print<span class="caret"></span></button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/inventory/print_restock_waybill/<?php echo $stock->restock_id.'/'.$warehouse_id.'/'.$warehouse_name; ?>">Print as Waybill</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Restock Waybill
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <h4><strong>Received From: <?php echo $stock->supplier_name; ?></strong></h4>
                            <h4><strong>Received at: <?php echo $stock->warehouse_name; ?></strong></h4>
                            <h4><strong>Date: <?php echo $stock->date_received; ?></strong></h4>
                            <br>
                            <table width="100%" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Quantity</th>
                                        <th>Product Name</th>
                                        <th>Unit Price</th>
                                        <th>Amount</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(!empty($restock_details)){
                                            $amount = 0.00;
                                            foreach($restock_details as $detail){
                                                echo '<tr id="'.$detail->id.'">';
                                                echo '<td>'.$detail->quantity_received.'</td>';
                                                echo '<td>'.$detail->product_name.'</td>';
                                                echo '<td></td>';
                                                echo '<td></td>';
                                                echo '<td><a href=""><i class="fa fa-times delete-restock-item"></i> </a> </td>';
                                                echo '</tr>';
                                            }
                                        }
                                    ?>
                                    <tr>
                                        <td colspan="3" align="right"><h4 class="amount" style="margin-right: 20px;">TOTAL AMOUNT (GHS)</h4></td>
                                        <td><h4 class="amount"><?php echo number_format($amount, 2); ?></h4></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-2"></div>
            </div>
            
        </div>
        <!-- /#page-wrapper -->

<?php $this->load->view('tpl/foot');