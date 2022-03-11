<?php
    $data = array('title'=> $post_details->title);
    $this->load->view('tpl/side_top',$data);
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Updates &amp; Information</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /. header row -->
            
            <div class="row">
                <div class="col-lg-9 col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3><?php echo $post_details->title ?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <?php echo $post_details->content; ?>
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

                <div class="col-lg-3 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Recent Posts</strong>
                        </div>
                        <div class="panel-body">
                            <?php if(isset($posts) && !empty($posts)): ?>
                            <?php foreach($posts as $post): ?>
                            <div class="well">
                                <h3><a href="#"><?php echo $post->title ?></a></h3>
                                <p><small>By Human Resource &bull; 7 minutes ago</small></p>
                            </div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?php $this->load->view('tpl/foot');