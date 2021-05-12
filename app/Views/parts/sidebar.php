<!-- Side Nav START -->
<?php $uri = service('uri'); ?>
<div class="side-nav">
    <div class="side-nav-inner">
        <!--  Drop down select box-->
        <li class="nav-item dropdown open pt-2 pb-3 mx-auto">
            <div class="dropdown">
                <select name="business" onchange="setEnv()" id="bis" class="tea-lg fm-control form-control-lg">
                    <option <?php if(session()->get('uri') == 'errands'){ echo 'selected'; } ?>
                        value="<?= base_url('Users/env/errands') ?>">Errand Service</option>
                    <option <?php if(session()->get('uri') == 'cargo'){ echo 'selected'; } ?>
                        value="<?= base_url('Users/env/cargo') ?>">Warehouse/Cargo Fulfilment</option>
                    <option <?php if(session()->get('uri') == 'ecommerce'){ echo 'selected'; } ?>
                        value="<?= base_url('Users/env/ecommerce') ?>">eCommerce Fulfilment</option>
                </select>
            </div>
        </li>
        <!--  select ends here-->
        <ul class="side-nav-menu scrollable">
            <li class="nav-item dropdown">
                <a href='<?= base_url("dashboard").'/'.session()->get('uri') ?>'>
                    <span class="icon-holder">
                        <i class="fas fa-desktop"></i>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <?php if ($uri->getSegment(2) == 'ecommerce' || session()->get('uri') === 'ecommerce'): ?>
            <!-- //ecommerce URI -->
            <li class="nav-item dropdown">
                <a href="<?= base_url('ecommerce/inbounds') ?>">
                    <span class="icon-holder">
                        <i class="fas fa-download"></i>
                    </span>
                    <span class="title"> Incoming</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="<?= base_url('ecommerce/inventory') ?>">
                    <span class="icon-holder">
                        <i class="fas fa-box-open"></i>
                    </span>
                    <span class="title"> Catalogue</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="<?= base_url('ecommerce/orders') ?>">
                    <span class="icon-holder">
                        <i class="fas fa-shopping-bag"></i>
                    </span>
                    <span class="title"> Orders</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="<?= base_url('ecommerce/channels') ?>">
                    <span class="icon-holder">
                        <i class="fas fa-shipping-fast"></i>
                    </span>
                    <span class="title"> Channels</span>
                </a>
            </li>
            <?php elseif ($uri->getSegment(1) == 'cargo' || session()->get('uri') === 'cargo'): ?>
            <!-- //cargo URI -->
            <li class="nav-item dropdown">
                <a href="#" data-toggle="modal" data-target="#requestModal">
                    <span class="icon-holder">
                        <i class="fas fa-download"></i>
                    </span>
                    <span class="title"> Request Shipment</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="<?= base_url('cargo/pickup') ?>">
                    <span class="icon-holder">
                        <i class="fas fa-box-open"></i>
                    </span>
                    <span class="title"> Pick Up Centers</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="<?= base_url('cargo/orders') ?>">
                    <span class="icon-holder">
                        <i class="fas fa-shopping-bag"></i>
                    </span>
                    <span class="title"> My Orders</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="<?= base_url('cargo/calculator') ?>">
                    <span class="icon-holder">
                        <i class="fas fa-calculator"></i>
                    </span>
                    <span class="title"> Cost Calculator</span>
                </a>
            </li>
            <?php else: ?>
            <?php //elseif ($uri->getSegment(1) == 'errands' || session()->get('uri') === 'errands'): ?>
            <!-- //cargo URI -->
            <li class="nav-item dropdown">
                <a href="<?= base_url('errands/request') ?>">
                    <span class="icon-holder">
                        <i class="fas fa-download"></i>
                    </span>
                    <span class="title"> Request Errands</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="<?= base_url('errands/pricing') ?>">
                    <span class="icon-holder">
                        <i class="fas fa-box-open"></i>
                    </span>
                    <span class="title"> Pricing</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="<?= base_url('errands/track') ?>">
                    <span class="icon-holder">
                        <i class="fas fa-shopping-bag"></i>
                    </span>
                    <span class="title"> Track Errands</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="<?= base_url('errands/orders') ?>">
                    <span class="icon-holder">
                        <i class="fas fa-shipping-fast"></i>
                    </span>
                    <span class="title"> My Orders</span>
                </a>
            </li>
            <?php endif ?>
            <!-- constant accross the whole dashboard -->
            <li class="nav-item dropdown">
                <a href="<?= base_url('reports') ?>">
                    <span class="icon-holder">
                        <i class="fas fa-chart-pie"></i>
                    </span>
                    <span class="title"> Reports</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="<?= base_url('settings') ?>">
                    <span class="icon-holder">
                        <i class="fas fa-cog"></i>
                    </span>
                    <span class="title"> Settings</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="<?= base_url('bills') ?>">
                    <span class="icon-holder">
                        <i class="fas fa-money-bill-alt"></i>
                    </span>
                    <span class="title"> My Bills</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="<?= base_url('waybills') ?>">
                    <span class="icon-holder">
                        <i class="fas fa-th-list"></i>
                    </span>
                    <span class="title"> Generate Waybill</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="<?= base_url('help') ?>">
                    <span class="icon-holder">
                        <i class="fab fa-teamspeak"></i>
                    </span>
                    <span class="title"> Help</span>
                </a>
            </li>
            <!-- <li class="nav-item dropdown">
                <a href="<?php //base_url('support') ?>">
                    <span class="icon-holder">
                        <i class="anticon anticon-message"></i>
                    </span>
                    <span class="title"> Contacts</span>
                </a>
            </li> -->
        </ul>
    </div>
</div>
<!-- Side Nav END -->

<!-- Modal -->
<div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Select your preffered objective</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <a href="<?= base_url('cargo/request/warehouse_store') ?>">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="text-center">
                                            <h4 class="m-b-0">Store in our Warehouse</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="card">
                            <a href="#" data-toggle="modal" data-target="#addressModal">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="text-center">
                                            <h4 class="m-b-0">Deliver to an Address</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Deliver to an address -->
<div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Has your package arrived?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <a href="<?= base_url('cargo/request/has_arrived') ?>">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="mx-auto text-center">
                                            <h2 class="m-b-0"> YES </h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="card">
                            <a href="<?= base_url('cargo/request/pending_arrival') ?>">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="mx-auto text-center">
                                            <h2 class="m-b-0"> NO </h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Container START -->
<div class="page-container">