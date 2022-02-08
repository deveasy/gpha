
<?php
    $data = array('title'=>'Sales Orders');
    $this->load->view('tpl/side_top',$data);
?>
            

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sales Orders</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.header row -->
            <div class="row buttons-row">
                <div class="col-lg-12">
                    <a href="<?php echo base_url(); ?>index.php/sales_orders/new_sales_order" class="btn btn-primary">+ Create New Order</a> 
                    <?php
                        $attributes = array('class'=>'form-inline','id'=>'filter-form');
                        echo form_open('sales_orders/filter_by_date', $attributes);
                    ?>
                        <div class="form-group">
                            <label>Filter by Date</label>
                            <input type="date" name="filter-date" class="form-control" value="<?php echo set_value('filter-date', $today); ?>" id="date-filter">
                        </div>
                        <button class="btn btn-primary"> GO </button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Products
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Invoice #</th>
                                        <th>Order Total</th>
                                        <th>Sold by</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(!empty($orders)){
                                            foreach($orders as $order){
                                                echo '<tr>';
                                                echo '<td><a href="'.base_url().'index.php/sales_orders/view_sales_order/'.$order->order_id.'">'.$order->order_id.'</a></td>';
                                                echo '<td>'.$order->order_total.'</td>';
                                                echo '<td>'.$order->firstname.'</td>';
                                                echo '<td>'.$order->order_date.'</td>';
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