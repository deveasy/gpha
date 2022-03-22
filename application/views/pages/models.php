<?php
    $data = array('title'=>'Brand Models');
    $this->load->view('tpl/side_top',$data);
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Brand Models</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New Model
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php echo validation_errors(); ?>
                                <div class="col-lg-12 col-md-12">
                                    <?php
                                        $attributes = array('role'=>'form');
                                        echo form_open('admin/add_model'); 
                                    ?>
                                        <div class="form-group">
                                            <select class="form-control" name="brand">
                                                <?php foreach($brands as $brand): ?>
                                                <option value="<?php echo $brand->brand_id; ?>"><?php echo $brand->brand_name; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Model</label>
                                            <input class="form-control" name="model" placeholder="Enter Model">
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-12 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 col-md-4 -->

                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Brand Models
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                <?php if(!empty($models)): ?>
                                    <?php foreach($models as $model): ?>
                                        <tr>
                                            <td><p><strong><?php echo $model->model_name ?></strong></p></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?php $this->load->view('tpl/foot');