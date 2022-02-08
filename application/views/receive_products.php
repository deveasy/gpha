<?php
    $data = array('title'=>'Stock Receipt');
    $this->load->view('tpl/side_top',$data);
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Stock Receipt</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <!-- row for single column -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Details</h4>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>QTY</th>
                                        <th>CPrice</th>
                                        <th>SPrice</th>
                                        <th>Per</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody id="stock-receipt">
                                    <tr>
                                        <td width="35%"><input type="text" class="form-control stock-receipt-input" id="bbrb"></td>
                                        <td width="13%">200</td>
                                        <td width="13%">15.59</td>
                                        <td width="13%">21.00</td>
                                        <td width="13%">PACK</td>
                                        <td width="13%">3118.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- row for two columns -->
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
                                <?php if(!empty($products)): ?>
                                <?php foreach($products as $product): ?>
                                <?php $n = 1; ?>
                                    <tr>
                                        <td id="<?php echo $product->product_code . 'name'; ?>" data-id="<?php echo $product->product_name ?>"><?php echo $product->product_name; ?></td>
                                        <td class="quantity"><input type="text" class="form-control" id="<?php echo $product->product_code . 'qty'; ?>" name="qty" style="width: 45px; height: 30px;"></td>
                                        <td>
                                            <span id="<?php echo $product->product_code.'_level'; ?>" data-id="<?php echo $product->current_level; ?>"></span>
                                            <?php
                                                if($product->current_level == 0){
                                                    echo '<button id="' . $product->product_code . '" class="btn btn-primary" disabled title="Items finished">Add</button>';
                                                }
                                                else{
                                                    echo '<button id="' . $product->product_code . '" class="btn btn-primary">Add</button>';
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
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
                            <h4>Details</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <?php $attributes = array('role'=>'form','id'=>'receiveStockFrm'); ?>
                                    <?php echo form_open('inventory/restock/'.$location_id.'/'.$location_name, $attributes); ?>
                                        <div class="form-group">
                                            <label>Invoice #</label>
                                            <input type="text" name="waybill_code" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Supplier:</label>
                                            <select name="supplier" class="form-control" id="supplier">
                                                <option></option>
                                                <?php
                                                    foreach($suppliers as $supplier){
                                                        echo '<option value="'.$supplier->supplier_id.'">'.$supplier->supplier_name.'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group" id="warehouseDiv">
                                            <label>Location</label>
                                            <select name="warehouse" class="form-control" id="warehouse">
                                                <option></option>
                                                <?php
                                                    foreach($locations as $location){
                                                        echo '<option value="'.$location->location_id.'">'.$location->location_name.'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group" id="payCodeDiv">
                                            <label>Pay Code</label>
                                            <select name="paycode" class="form-control" id="paycode">
                                                <option></option>
                                                <option value="">Credit</option>
                                                <option value="">Cash</option>
                                                <option value="">Credit/DebitCard</option>
                                                <option value="">Mobile Money</option>
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
                            <a href="#" class="btn btn-primary" id="receiveStockBtn">Receive</a>
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