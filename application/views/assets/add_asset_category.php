<?php
    $data = array('title'=>'Asset Categories');
    $this->load->view('tpl/side_top',$data);
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Asset Categories</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New Category
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php echo validation_errors(); ?>
                                <div class="col-lg-12 col-md-12">
                                    <?php
                                        $attributes = array('role'=>'form');
                                        echo form_open('assets/add_category'); 
                                    ?>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <input class="form-control" name="category_name" placeholder="Enter Category Name" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>Category Description</label>
                                            <textarea class="form-control" rows="4" name="category_description"><?php echo set_value('category_description'); ?></textarea>
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
                            All Asset Categories
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <?php
                                        if(!empty($categories)){
                                            foreach($categories as $category){
                                                echo '<tr>';
                                                    echo '<td><p><strong>'.$category->category_name.'</strong></p></td>';
                                                echo '</tr>';
                                            }
                                        }
                                    ?>
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