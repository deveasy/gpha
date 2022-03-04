
<?php
    if(isset($shop_name)){
        $data = array('title'=>$shop_name.'Issues');
    }
    else{
        $data = array('title'=>'Issues');
    }
    $this->load->view('tpl/side_top',$data);
?>
            

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Issues &amp; Solutions</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /. header row -->
            <!-- buttons row -->
            <div class="row buttons-row">
                <div class="col-lg-6">
                    <a href="<?php echo base_url() ?>index.php/tickets/new" class="btn btn-primary">+ Report a problem</a>
                </div>
                <div class="col-lg-6">
                    <?php
                        $attributes = array('class'=>'form-inline');
                        echo form_open('products/shop_products', $attributes);
                    ?>
                        <div class="form-group">
                            <label>Select Location:</label>
                            <select class="form-control" name="shop" onchange="this.form.submit()">
                                <option> - Select - </option>
                                <option value="all">All Locations</option>
                                <?php
                                    foreach ($shops as $shop) {
                                        echo '<option value="'.$shop->shop_id.'">'.$shop->shop_name.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /. buttons row -->
            <div class="row">
                <div class="col-lg-12">
                    <?php 
                        if($this->session->flashdata('product_update')){
                            echo '<div class="alert alert-success" role="alert" id="pro-update-success">';
                                echo '<strong>'.$this->session->flashdata('product_update').'</strong>';
                            echo '</div>';
                        }
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Products
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Staff</th>
                                        <th>Equipment Type</th>
                                        <th>Serial</th>
                                        <th>Unit</th>
                                        <th>Department</th>
                                        <th>Problem Type</th>
                                        <th>Problem Desc</th>
                                        <th>Date Reported</th>
                                        <th>Reported By</th>
                                        <th>Assigned To</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(isset($products) && !empty($products)){
                                            foreach($products as $product){
                                                echo '<tr>';
                                                echo '<td>'./*$product->product_name.*/'</td>';
                                                echo '<td>'./*$product->product_category.*/'</td>';
                                                echo '<td>'./*$product->unit_price.*/'</td>';
                                                echo '<td>'./*$product->cost_price.*/'</td>';
                                                echo '<td>'./*$product->cost_price.*/'</td>';
                                                echo '<td>'./*$product->cost_price.*/'</td>';
                                                echo '<td>'./*$product->cost_price.*/'</td>';
                                                echo '<td>'./*$product->cost_price.*/'</td>';
                                                echo '<td>'./*$product->cost_price.*/'</td>';
                                                echo '<td>'./*$product->cost_price.*/'</td>';
                                                echo '<td><a href="'.base_url().'index.php/products/edit_product/'.$product->product_code.'"><i class="fa fa-edit fa-fw"></i> Edit</a></td>';
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
                <!-- /.col-lg-9 -->
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->

<?php $this->load->view('tpl/foot');