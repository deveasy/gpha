
<?php
    $data = array('title'=>'Warehouse Orders');
    $this->load->view('tpl/side_top',$data);
?>
            

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Warehouse Orders
                        <a href="<?php echo base_url(); ?>index.php/inventory/new_warehouse_sales_order/<?php echo $warehouse_details[0].'/'.$warehouse_details[1]; ?>" class="btn btn-primary"> New Sale </a>
                        <a href="<?php echo base_url(); ?>index.php/inventory/warehouse_inventory/<?php echo $warehouse_details[0].'/'.$warehouse_details[1]; ?>" class="btn btn-primary"> Back </a>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Recently Received Invoices
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer Namae</th>
                                        <th>Dispatcher</th>
                                        <th>Vehicle No.</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(!empty($orders)){
                                            foreach($orders as $order){
                                                echo '<tr class="trans">';
                                                echo '<td><a href="'. base_url() . 'index.php/inventory/view_warehouse_order/'.$order->order_id.'/'.$warehouse_details[0].'/'.$warehouse_details[1].'" class="pro-trans">'.$order->order_id.'</a></td>';
                                                echo '<td>'.$order->customer_name.'</td>';
                                                echo '<td>'.$order->dispatcher.'</td>';
                                                echo '<td>'.$order->vehicle_number.'</td>';
                                                echo '<td>'.$order->order_date.'</td>';
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