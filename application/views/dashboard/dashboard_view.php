<?php
    $data = array('title'=>'Dashboard');
    $this->load->view('tpl/side_top',$data);
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Inventory Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <h3 class="panel-title">Assets</h3>
                        </div>
                        <div class="collapse" id="grossSales">
                            <div class="panel-body">
                                <h3><?php echo (!empty($total_orders->order_total)? 'GHS'.$total_orders->order_total : 'No sales'); ?></h3>
                            </div>
                        </div>
                        <a href="#grossSales" data-toggle="collapse" aria-expanded="false" aria-controls="grossSales">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <h2 class="panel-title">Consumables</h2>
                        </div>
                        <div class="collapse" id="productsSold">
                            <div class="panel-body">
                                <h3><?php echo !empty($total_products->quantity)? $total_products->quantity : '0'; ?> products sold</h3>
                            </div>
                        </div>
                        <a href="#productsSold" data-toggle="collapse" aria-expanded="false" aria-controls="productsSold">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <h2 class="panel-title">Issues Reported</h2>
                        </div>
                        <div class="collapse" id="oldShopCollapse">
                            <div class="panel-body">
                                <h3>GHS <?php //echo $old_shop_orders ?></h3>
                                <h3><?php //echo (!empty($old_shop_products)? $old_shop_products : 0); ?> products sold</h3>
                            </div>
                        </div>
                        <a href="#oldShopCollapse" data-toggle="collapse" aria-expanded="false" aria-controls="oldShopCollapse">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <h2 class="panel-title">Total Requests</h2>
                        </div>
                        <div class="collapse" id="newShopCollapse">
                            <div class="panel-body">
                                <h3>GHS <?php //echo $new_shop_orders ?></h3>
                                <h3><?php //echo (!empty($new_shop_products)? $new_shop_products : 0); ?> products sold</h3>
                            </div>
                        </div>
                        <a href="#newShopCollapse" data-toggle="collapse" aria-expanded="false" aria-controls="newShopCollapse">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> <strong>Item Request Chart</strong>
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Chart Details</a>
                                        </li>
                                        <li><a href="#">Another data</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Another link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="gpha-area-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-map-marker fa-fw"></i> Locations
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h1>Google Map</h1>
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                <div class="col-lg-8">
                                    <h1>Geographical map here</h1>
                                    <div id="map"></div>

                                    <script>
                                        var customLabel = {
                                            restaurant: {
                                                label: 'R'
                                            },
                                            bar: {
                                                label: 'B'
                                            }
                                        };

                                        function initMap() {
                                            var map = new google.maps.Map(document.getElementById('map'), {
                                                center: new google.maps.LatLng(-33.863276, 151.207977),
                                                zoom: 12
                                            });
                                            var infoWindow = new google.maps.InfoWindow;

                                            // Change this depending on the name of your PHP or XML file
                                            downloadUrl('https://storage.googleapis.com/mapsdevsite/json/mapmarkers2.xml', function(data) {
                                                var xml = data.responseXML;
                                                var markers = xml.documentElement.getElementsByTagName('marker');
                                                Array.prototype.forEach.call(markers, function(markerElem) {
                                                    var id = markerElem.getAttribute('id');
                                                    var name = markerElem.getAttribute('name');
                                                    var address = markerElem.getAttribute('address');
                                                    var type = markerElem.getAttribute('type');
                                                    var point = new google.maps.LatLng(
                                                        parseFloat(markerElem.getAttribute('lat')),
                                                        parseFloat(markerElem.getAttribute('lng')));

                                                    var infowincontent = document.createElement('div');
                                                    var strong = document.createElement('strong');
                                                    strong.textContent = name
                                                    infowincontent.appendChild(strong);
                                                    infowincontent.appendChild(document.createElement('br'));

                                                    var text = document.createElement('text');
                                                    text.textContent = address
                                                    infowincontent.appendChild(text);
                                                    var icon = customLabel[type] || {};
                                                    var marker = new google.maps.Marker({
                                                        map: map,
                                                        position: point,
                                                        label: icon.label
                                                    });
                                                    marker.addListener('click', function() {
                                                        infoWindow.setContent(infowincontent);
                                                        infoWindow.open(map, marker);
                                                    });
                                                });
                                            });
                                        }

                                        function downloadUrl(url, callback) {
                                            var request = window.ActiveXObject ?
                                                new ActiveXObject('Microsoft.XMLHTTP') :
                                                new XMLHttpRequest;

                                            request.onreadystatechange = function() {
                                                if (request.readyState == 4) {
                                                    request.onreadystatechange = doNothing;
                                                    callback(request, request.status);
                                                }
                                            };

                                            request.open('GET', url, true);
                                            request.send(null);
                                        }

                                        function doNothing() {}
                                    </script>
                                    <script async defer
                                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9GxYjd93eC6wTMZieAWICZtbJYsF5S-E&callback=initMap">
                                    </script>
                                </div>
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-clock-o fa-fw"></i> Responsive Timeline
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <h1>Something beneficial will go here.</h1>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <!-- chat panel -->
                    <div class="chat-panel panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i> Item Requests Chat
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-refresh fa-fw"></i> Refresh
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-check-circle fa-fw"></i> Available
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-times fa-fw"></i> Busy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-clock-o fa-fw"></i> Away
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-sign-out fa-fw"></i> Sign Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="chat">
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="<?php echo base_url(); ?>assets/img/placeholders/50-blue.jpg" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">Michael Manu</strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 12 mins ago
                                            </small>
                                        </div>
                                        <p>
                                            Toner needed for HR department
                                        </p>
                                    </div>
                                </li>
                                <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="<?php echo base_url(); ?>assets/img/placeholders/50-red.jpg" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 13 mins ago</small>
                                            <strong class="pull-right primary-font">Emmanuel Yartey</strong>
                                        </div>
                                        <p>
                                            Toner will be delivered shortly
                                        </p>
                                    </div>
                                </li>
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="<?php echo base_url(); ?>assets/img/placeholders/50-blue.jpg" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">Abigail Adjei</strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 14 mins ago</small>
                                        </div>
                                        <p>
                                            1 mouse needed at the security office.
                                        </p>
                                    </div>
                                </li>
                                <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="<?php echo base_url(); ?>assets/img/placeholders/50-red.jpg" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 15 mins ago</small>
                                            <strong class="pull-right primary-font">Emmanuel Yartey</strong>
                                        </div>
                                        <p>
                                            Mouse will be delivered shortly.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <div class="input-group">
                                <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                                <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" id="btn-chat">
                                        Send
                                    </button>
                                </span>
                            </div>
                        </div>
                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel chat-panel -->

                    <!-- bar chart panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> <strong>Reorder Items</strong>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="gpha-bar-chart"></div>
                            <div class="list-group">
                                <?php if(isset($best_sellers)): ?>
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
                            <a href="<?php echo base_url(); ?>index.php/dashboard/best_sellers" class="btn btn-default btn-block">View All Reorders</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /. bar chart panel -->
                    <!-- donut chart panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> <strong>Available Asset Chart</strong>
                        </div>
                        <div class="panel-body">
                            <div id="gpha-donut-chart"></div>
                            <script type="text/javascript">
                                $(function(){
                                    Morris.Donut({
                                        element: 'dashboard-donut-chart',
                                        data: <?php echo $shop_products; ?>,
                                        resize: true
                                    });
                                });
                            </script>
                            <a href="#" class="btn btn-default btn-block">View More</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /. donut chart panel -->
                    
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?php $this->load->view('tpl/dash_foot');
