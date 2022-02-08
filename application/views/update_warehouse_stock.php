<?php
    $data = array('title'=>'Update Warehouse Stock');
    $this->load->view('tpl/side_top', $data);
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update Warehouse Stock
                        <a href="<?php echo base_url(); ?>index.php/inventory/warehouse_inventory/<?php echo $warehouse_details['id'].'/'.$warehouse_details['name']; ?>" class="btn btn-primary">Back</a>
                    </h1>
                    <span class="warehouse" id="<?php echo $warehouse_details['id']; ?>"></span>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <?php 
                        if($this->session->flashdata('update_stock')){
                            echo '<div class="alert alert-success" role="alert" id="pro-update-success">';
                                echo '<strong>'.$this->session->flashdata('update_stock').'</strong>';
                            echo '</div>';
                        }
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Available Products</h4>
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Current Level</th>
                                        <th>QTY</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($inventory as $item): ?>
                                <?php $n = 1; ?>
                                    <tr id="<?php echo $item->product_code; ?>">
                                        <td><?php echo $item->product_name; ?></td>
                                        <td id="<?php echo $item->product_code . '_level'; ?>"><?php echo $item->current_level; ?></td>
                                        <?php echo form_open('inventory/update_product_level/'.$warehouse_details['id'].'/'.$item->product_code.'/'.$warehouse_details['name']); ?>
                                        <td class="quantity"><input type="text" class="form-control" name="<?php echo $item->product_code . 'qty'; ?>" style="width: 45px; height: 30px;"></td>
                                        <td>
                                            <button class="btn btn-primary"> Update </button>
                                        </form>
                                            <button class="btn btn-primary reset">Reset</button>
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
                <!-- /.col-lg-12 -->
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?php $this->load->view('tpl/foot');