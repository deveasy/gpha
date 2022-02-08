
<?php
$data = array('title'=>'Search Results');
$this->load->view('tpl/side_top',$data);
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Search Results</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <h3><a href="#">Search result 1</a></h3>
            <p><strong>if there is any search result description, it is displayed here...</strong></p>
            <p>this shows what exactly the search result is i.e. product, customer, supplier, patient, etc.</p>
            <h3><a href="#">Search result 2</a></h3>
            <p><strong>if there is any search result description, it is displayed here...</strong></p>
            <p>this shows what exactly the search result is i.e. product, customer, supplier, patient, etc.</p>
            <h3><a href="#">Search result 3</a></h3>
            <p><strong>if there is any search result description, it is displayed here...</strong></p>
            <p>this shows what exactly the search result is i.e. product, customer, supplier, patient, etc.</p>
            <h3><a href="#">Search result 4</a></h3>
            <p><strong>if there is any search result description, it is displayed here...</strong></p>
            <p>this shows what exactly the search result is i.e. product, customer, supplier, patient, etc.</p>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->

<?php $this->load->view('tpl/foot');