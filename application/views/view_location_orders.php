
<?php
    $data = array('title'=>'Location Orders');
    $this->load->view('tpl/side_top',$data);
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Location Orders <a href="<?php echo base_url(); ?>index.php/locations/new_order" class="btn btn-primary">+ New Order</a> </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Location Orders
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Location</th>
                                        <th>Order ID</th>
                                        <th>Date Ordered</th>
                                        <th>Ordered By</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(!empty($location_orders)){
                                            foreach($location_orders as $order){
                                                echo '<tr class="' . ($order->status == 'seen')? 'success">' : 'danger">';
                                                echo '<td>' . $order->location_name . '</td>';
                                                echo '<td>' . $order->order_id . '</td>';
                                                echo '<td>' . $order->order_date . '</td>';
                                                echo '<td>' . $order->staff_id . '</td>';
                                                echo '<td>' . $order->status . '</td>';
                                                echo '<td>
                                                        <a href="'. base_url() .'index.php/locations/order/'.$order->order_id.'"><i class="fa fa-gear" title="View"></i></a> &nbsp;&nbsp;
                                                        <a href="'.base_url().'index.php/locations/delete_order/'.$order->order_id.'"><i class="fa fa-trash-o delete-staff" title="Delete"></i></a>
                                                    </td>';
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
            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

<?php $this->load->view('tpl/foot');