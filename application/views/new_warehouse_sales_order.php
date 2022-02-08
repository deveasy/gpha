<?php
    $data = array('title'=>'New Sales Order');
    $this->load->view('tpl/side_top',$data);
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Sales Order <!--<a href="#" class="pull-right small"><i class="fa fa-shopping-cart"></i> Order Details</a>--></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Select Products</h4>
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>QTY</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($products as $product): ?>
                                <?php $n = 1; ?>
                                    <tr>
                                        <td id="<?php echo $product->product_code . 'name'; ?>"><?php echo $product->product_name; ?></td>
                                        <td class="quantity"><input type="text" class="form-control" id="<?php echo $product->product_code . 'qty'; ?>" name="qty" style="width: 45px; height: 30px;"></td>
                                        <td><button id="<?php echo $product->product_code; ?>" class="btn btn-primary">Add</button></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Order Details</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <?php $attributes = array('role'=>'form','id'=>'orderFrm'); ?>
                                    <?php echo form_open('inventory/new_warehouse_order/'.$source.'/'.$source_name, $attributes); ?>
                                        <div class="form-group" id="sourceDiv">
                                            <label>Order Source: <?php echo str_replace('%20', ' ', $source_name); ?></label>
                                            <input type="hidden" name="source" id="source" value="<?php echo $source; ?>">
                                        </div>
                                        <div class="form-group" id="customerDiv">
                                            <label>Customer Name</label>
                                            <input type="text" name="customer_name" class="form-control" id="customerName">
                                        </div>
                                        <div class="form-group">
                                            <label>Receipt No.</label>
                                            <input type="text" name="receipt_number" class="form-control" id="receipt_number">
                                        </div>
                                        <div class="form-group">
                                            <label>Dispatcher</label>
                                            <input type="text" name="dispatcher" class="form-control" id="dispatcher">
                                        </div>
                                        <div class="form-group">
                                            <label>Vehicle No.</label>
                                            <input type="text" name="vehicle_number" class="form-control" id="vehicle_number">
                                        </div>
                                        <div class="form-group">
                                            <label>Destination</label>
                                            <input type="text" name="destination" class="form-control" id="destination">
                                        </div>

                                        <div id="transferDetails">
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                            <br>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="invoice-dataTable">
                                <thead>
                                    <tr>
                                        <th>QTY</th>
                                        <th>Product Name</th>
                                    </tr>
                                </thead>
                                <tbody id="waybill">
                                    <tr>
                                        <td align="right"><strong>TOTAL (GHS)</strong></td>
                                        <td><strong id="totalAmount"></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <a href="#" class="btn btn-primary" id="orderBtn">Submit</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?php $this->load->view('tpl/foot');