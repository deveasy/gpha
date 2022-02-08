<?php
    $data = array('title'=>'Edit Product');
    $this->load->view('tpl/side_top',$data);
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Product <a href="<?php echo base_url(); ?>index.php/products" class="btn btn-primary">View All Products</a></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Product Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php echo validation_errors(); ?>
                                <div class="col-lg-6 col-md-6">
                                    <?php
                                        $attributes = array('role'=>'form');
                                        echo form_open_multipart('products/update_shop_product/'.$product->product_code.'/'.$shop_id); 
                                    ?>
                                        <div class="form-group">
                                            <label>Product Code</label>
                                            <input class="form-control" name="product_code" placeholder="Enter Product Code" value="<?php echo (isset($product->product_code) ? $product->product_code : set_value('product_code')) ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input class="form-control" name="product_name" placeholder="Enter Product Name" value="<?php echo (isset($product->product_name) ? $product->product_name : set_value('product_name')) ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Product Image</label>
                                            <input type="file" name="product_image">
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="product_category">
                                                <option value="Rice" <?php echo (($product->product_category == 'Rice')?set_select('product_category',$product->product_category,TRUE):set_select('product_category', 'Rice')) ?>>Rice</option>
                                                <option value="Sugar">Sugar</option>
                                                <option value="Tomato Paste">Tomato Paste</option>
                                                <option value="Wheat">Wheat</option>
                                                <option value="Flour">Flour</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Product Description</label>
                                            <textarea class="form-control" rows="4" name="description"><?php echo (isset($product->description) ? $product->description : set_value('description')) ?></textarea>
                                        </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->

                                <div class="col-lg-6 col-md-6">
                                            <label>Product Price</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">¢</span>
                                            <input type="text" class="form-control" name="unit_price" placeholder="Unit Price" value="<?php echo (isset($product->unit_price) ? $product->unit_price : set_value('unit_price')) ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Re-Order Level</label>
                                            <input class="form-control" name="reorder_level" placeholder="Enter re-order level" value="<?php echo (isset($product->reorder_level) ? $product->reorder_level : set_value('reorder_level')) ?>">
                                        </div>
                                        <input type="hidden" name="shop_id" value="<?php echo $shop_id; ?>">
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?php $this->load->view('tpl/foot');