<?php
    $data = array('title'=>'Add Update');
    $this->load->view('tpl/side_top',$data);
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Update</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /. header row -->

            <div class="row">
                <div class="col-log-12">
                    <?php 
                        if($this->session->flashdata('news_update')){
                            echo '<div class="alert alert-success" role="alert" id="pro-update-success">';
                                echo '<strong>'.$this->session->flashdata('news_update').'</strong>';
                            echo '</div>';
                        }
                    ?>
                </div>
            </div>
            <!-- /. flash data -->
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New Post
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php echo validation_errors(); ?>
                                <div class="col-lg-12 col-md-12">
                                    <?php
                                        $attributes = array('role'=>'form');
                                        echo form_open('dashboard/add_post'); 
                                    ?>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" placeholder="Enter Title" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Body</label>
                                            <textarea id="editor" name="content"><?php echo set_value('content'); ?></textarea>
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

                <div class="col-lg-7 col-md-7">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Recent Posts
                        </div>
                        <div class="panel-body">
                            <?php if(isset($posts) && !empty($posts)): ?>
                            <?php foreach($posts as $post): ?>
                            <div class="well">
                                <h3><a href="#"><?php echo $post->title ?></a></h3>
                                <p><small>By Human Resource &bull; 7 minutes ago</small></p>
                                <p><?php echo $post->content ?></p>
                                <p><a href="#">Read more...</a></p>
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