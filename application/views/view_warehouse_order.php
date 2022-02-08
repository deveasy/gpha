
<?php
$data = array('title'=>'View Warehouse Order');
$this->load->view('tpl/side_top',$data);
?>


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Receipt #: <?php echo $order->order_id; ?>
                <a href="<?php echo base_url(); ?>index.php/inventory/warehouse_orders/<?php echo $warehouse_details['id'].'/'.$warehouse_details['name']; ?>" class="btn btn-primary">View All Orders</a>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /. header row -->
    <div class="row">
        <!-- Print dropdown menu -->
        <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Options &nbsp;&nbsp;<span class="caret"></span></button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/inventory/print_warehouse_order_waybill/<?php echo $order->order_id; ?>">As Waybill</a>
                </li>
            </ul>
        </div>
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Warehouse Order
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <h4><strong>Cahsier: <?php echo $order->firstname; ?></strong></h4>
                    <h4><strong>Date: <?php echo $order->order_date; ?></strong></h4>
                    <h4><strong>Customer Name: <?php echo $order->customer_name; ?></strong></h4>
                    <br>
                    <table width="100%" class="table table-hover">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <span id="warehouse" data-id="<?php echo $warehouse_details['id']; ?>"></span>
                        <?php
                        if(!empty($order_details)){
                            $amount = 0.00;
                            foreach($order_details as $detail){
                                echo '<tr id="'.$detail->id.'">';
                                echo '<td>'.$detail->product_name.'</td>';
                                echo '<td>'.$detail->quantity.'</td>';
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td align="center"><a href="#" class="delete"><i class="fa fa-times delete-order-item" title="delete"></i></a></td>';
                                echo '</tr>';
                                //$amount += $detail->extended_price;
                            }
                        }
                        ?>
                        <tr>
                            <td colspan="3" align="right"><h4 class="amount" style="margin-right: 20px;">TOTAL AMOUNT (GHS)</h4></td>
                            <td><h4 class="amount"><?php //echo number_format($amount, 2); ?></h4></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
            <a href="<?php echo base_url() .'index.php/inventory/view_add_item_to_warehouse_order/'.$order->order_id.'/'. $warehouse_details['id'].'/'. $warehouse_details['name']; ?>" class="btn btn-primary pull-right">Add Item(s)</a>
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-2"></div>
    </div>

</div>
<!-- /#page-wrapper -->

<?php $this->load->view('tpl/foot');