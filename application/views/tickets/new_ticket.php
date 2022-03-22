<?php
    $data = array('title'=>'Report Problem');
    $this->load->view('tpl/side_top',$data);
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Report Problem </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Problem Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php echo validation_errors(); ?>
                                <div class="col-lg-6 col-md-6">
                                    <form id="addAssetForm" action="index.php/tickets/add_ticket">
                                        <div class="form-group">
                                            <label>Select Department</label>
                                            <select class="form-control" name="department" id="department" required>
                                                <option value="">----Select Department----</option>
                                                <?php
                                                    if(isset($departments) && !empty($departments)){
                                                        foreach($categories as $category){
                                                            echo '<option value="'.$category->category_id.'">'.$category->category_name.'</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Select Problem Type</label>
                                            <select class="form-control" name="problem-type" id="problem-type" required>
                                                <option>----Select Problem Type----</option>
                                                <option value="Software">Software</option>
                                                <option value="Hardware">Hardware</option>
                                                <option value="Network">Network</option>
                                                <option value="Power">Power</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Assign To</label>
                                            <select class="form-control" name="assign-to" id="assign-to" required>
                                                <option value="">----Select Category----</option>
                                                <?php
                                                    if(isset($categories)){
                                                        foreach($categories as $category){
                                                            echo '<option value="'.$category->category_id.'">'.$category->category_name.'</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Problem Description</label>
                                            <textarea class="form-control" rows="8" name="problem-description" id="problem-description">

                                            </textarea>
                                        </div>
                                        <button class="btn btn-primary pull-right" id="addTicket" name="addTicket" type="submit">Submit</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->

                                <div class="col-lg-6 col-md-6">
                                        &nbsp;
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
        <script>
            var base_url = "<?php echo base_url(); ?>";

            $(document).ready(function(){
                $("#lanMac").autocomplete({
                    source: function(request, response){
                        $.ajax({
                            url: base_url + "index.php/assets/search",
                            data: {
                                term: request.term
                            },
                            dataType: "json",
                            success: function(data){
                                var resp = $.map(data, function(obj){
                                    return obj.name;
                                });
                                response(resp);
                            }
                        });
                    },
                    minLength: 1
                });
            });
        </script>

<?php $this->load->view('tpl/foot');