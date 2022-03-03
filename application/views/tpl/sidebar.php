<?php 
    $session_data = $this->session->userdata('logged_in');
    $role = $session_data['role']; 

    $shops = $this->session->userdata('shops');
    $warehouses = $this->session->userdata('warehouses');
?>

<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <?php echo form_open('search'); ?>
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    </span>
                                </div>
                                <!-- /input-group -->
                            </form>
                        </li>

                        <!-- first privilege user role menu -->
                        <?php if($role == 1): ?>
                        <li>
                            <a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/assets"><i class="fa fa-product-hunt fa-fw"></i> Assets</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/consumables"><i class="fa fa-building fa-fw"></i> Consumables</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/requests"><i class="fa fa-truck fa-fw"></i> Request &amp; Receive</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-paper-plane fa-fw"></i> Reports<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url() ?>index.php/reports/assets_report"> Asset</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>index.php/reports/issues_report"> Issues</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>index.php/reports/consumables_report"> Consumables</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>index.php/reports/assets_out_of_warranty"> Asset Out of Warranty</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>index.php/reports/assets_over_five_years"> Asset Over 5 Years</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>index.php/reports/assets_purchase"> Asset Purchase Report</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>index.php/reports/consumables_disposed"> Consumable Disposed</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>index.php/reports/assets_discarded"> Asset Discarded</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/issues"><i class="fa fa-cogs fa-fw"></i> Problems</a>
                        </li>
                        <?php endif; ?>
                        <!-- end first privilege user role menu -->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>