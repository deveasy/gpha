
<?php
    $data = array('title'=>'View Product Transfer');
    $this->load->view('tpl/side_top',$data);
?>
            

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Transfer Invoice #: <?php echo $transfer_id; ?> <a href="<?php echo base_url(); ?>index.php/inventory/product_transfers/<?php echo $source .'/'. $source_name; ?>" class="btn btn-primary">Back</a></h1>
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
                            <a href="<?php echo base_url(); ?>index.php/inventory/print_waybill/<?php echo $transfer_id. '/'.$destination. '/' . $source_name; ?>">Print as Waybill</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Transfer Invoice
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="90%">
                                <tr>
                                    <td valign="top">
                                        <h4>Transferred From: <?php echo str_replace('%20', ' ', $source_name); ?></h4>
                                        <h4>Transferred To: <?php echo $transfer->shop_name; ?></h4>
                                        <h4>Date: <?php echo $transfer->transfer_date; ?></h4>
                                    </td>
                                    <td valign="top">
                                        <h4>Dispatcher: <?php echo $transfer->dispatcher; ?></h4>
                                        <h4>Vehicle No.: <?php echo $transfer->vehicle_number; ?></h4>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <table width="100%" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Quantity</th>
                                        <th>Product Name</th>
                                        <th>Unit Price</th>
                                        <th>Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(!empty($transfer_details)){
                                            $amount = 0.00;
                                            foreach($transfer_details as $detail){
                                                echo '<tr id="'.$detail->id.'">';
                                                echo '<td>'.$detail->quantity.'</td>';
                                                echo '<td>'.$detail->product_name.'</td>';
                                                echo '<td>'.$detail->unit_price.'</td>';
                                                echo '<td>'.number_format(($detail->quantity * $detail->unit_price), 2).'</td>';
                                                echo '<td align="center"><a href="javascript:void(0)"><i class="fa fa-times delete-item" title="delete"></i></a></td>';
                                                echo '</tr>';
                                                $amount += ($detail->quantity * $detail->unit_price);
                                            }
                                        }
                                    ?>
                                    <tr>
                                        <td colspan="3" align="right"><h4 class="amount" style="margin-right: 20px;">TOTAL AMOUNT (GHS)</h4></td>
                                        <td colspan="2" bgcolor="#f5f5f5"><h4 class="amount"><?php echo number_format($amount, 2); ?></h4></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <a href="<?php echo base_url().'index.php/inventory/add_items_to_transfer/'. $transfer_id.'/'.$source.'/'.$source_name.'/'.$destination.'/'.$transfer->shop_name; ?>" class="btn btn-primary pull-right">Add Item(s)</a>
                    <br>
                    <p>&nbsp;</p>
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-2"></div>
            </div>
            
        </div>
        <!-- /#page-wrapper -->

<?php $this->load->view('tpl/foot');