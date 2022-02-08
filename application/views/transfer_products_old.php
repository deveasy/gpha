<?php
    $data = array('title'=>'Transfer Products');
    $this->load->view('tpl/side_top',$data);
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Transfer Products</h1>
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
                            <h4>Transfer To</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <?php $attributes = array('role'=>'form','id'=>'transferFrm'); ?>
                                    <?php echo form_open('inventory/transfer', $attributes); ?>
                                        <div class="form-group" id="sourceDiv">
                                            <label>Transfer From</label>
                                            <select name="source" class="form-control" id="source">
                                                <option></option>
                                                <?php
                                                    foreach($warehouses as $warehouse){
                                                        echo '<option value="'.$warehouse->warehouse_id.'">'.$warehouse->warehouse_name.'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group" id="destinationDiv">
                                            <label>Transfer To</label>
                                            <select name="destination" class="form-control" id="destination">
                                                <option></option>
                                                <?php
                                                    foreach($shops as $shop){
                                                        echo '<option value="'.$shop->shop_id.'">'.$shop->shop_name.'</option>';
                                                    }
                                                ?>
                                            </select>
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
                            <a href="#" class="btn btn-primary" id="transferBtn">Transfer</a>
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