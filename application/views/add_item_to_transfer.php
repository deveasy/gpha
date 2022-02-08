<?php
$data = array('title'=>'Transfer Products');
$this->load->view('tpl/side_top',$data);
?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Add Items to Transfer #: <?php echo $transfer_id; ?>
                    <a href="<?php echo base_url(); ?>index.php/inventory/view_product_transfer/<?php echo $transfer_id.'/'.$destination.'/'. $source_name .'/'. $source; ?>" class="btn btn-primary">Back</a>
                </h1>
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
                                    <td id="<?php echo $product->product_code . 'name'; ?>" data-id="<?php echo $product->product_name ?>"><?php echo $product->product_name; ?></td>
                                    <td class="quantity"><input type="text" class="form-control" id="<?php echo $product->product_code . 'qty'; ?>" name="qty" style="width: 60px; height: 30px;"></td>
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
                                <?php echo form_open('inventory/add_items/'.$transfer_id.'/'.$destination.'/'.$source_name.'/'.$source, $attributes); ?>
                                <div class="form-group" id="sourceDiv">
                                    <label>Transferred From: <?php echo str_replace('%20', ' ', $source_name); ?></label>
                                    <input type="hidden" name="source" id="source" value="<?php echo $source; ?>">
                                </div>
                                <div class="form-group" id="destinationDiv">
                                    <label>Transferred To: <?php echo str_replace('%20',' ', $destination_name); ?></label>
                                    <input type="hidden" name="destination" id="destination" value="<?php echo $destination; ?>">
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
                        <a href="#" class="btn btn-primary" id="transferBtn">Submit</a>
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