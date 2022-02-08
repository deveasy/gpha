<?php
    $data = array('title'=>'Dashboard');
    $this->load->view('tpl/side_top',$data);
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Best Selling Products</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> <strong>Best Selling Products</strong>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <?php if($best_sellers): ?>
                                    <?php foreach($best_sellers as $best_seller): ?>
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-comment fa-fw"></i> <?php echo $best_seller->product_name; ?>
                                        <span class="pull-right text-muted small"><em><?php echo $best_seller->quantity .' sold'; ?></em>
                                        </span>
                                    </a>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <!-- /.list-group -->
                            <a href="#" class="btn btn-default btn-block">View All Best Sellers</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?php $this->load->view('tpl/dash_foot');
