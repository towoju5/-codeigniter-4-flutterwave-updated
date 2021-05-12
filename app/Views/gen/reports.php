<!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Dasboard</a>
                    <span class="breadcrumb-item active"><?= $page ?></span>
                </nav>
            </div>
        </div>
        
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $title ?></h4>
                </div>

                <div class="card-body">
                    <ul class="timeline timeline-sm">
                        <?php foreach($history as $item): ?>
                        
                        <li class="timeline-item">
                            <div class="timeline-item-head">
                                <div class="avatar avatar-icon avatar-sm avatar-cyan">
                                    <i class="anticon anticon-check"></i>
                                </div>
                            </div>
                            <div class="timeline-item-content">
                                <div class="m-l-10">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-image">
                                            <img src="assets/images/avatars/thumb-4.jpg" alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <h6 class="m-b-0">
                                            <?php if ($item['tranx_type'] === 'warehouse_store'){
                                                echo "Added Product to Warehouse Storage (Cargo Item) ";
                                            } elseif ($item['tranx_type'] === 'pending_arrival'){
                                                echo "Added a Pending Arrival cargo Item";
                                            } elseif ($item['tranx_type'] === 'has_arrived'){
                                                echo "Added an Arrived cargo Item for PickUP & Sending";
                                            } ?>
                                            </h6>
                                            <span class="text-muted font-size-13">
                                                Paid Amount: 
                                                <span class="m-l-5"><?= $item['amount'] ?> </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="m-t-20">
                                        <p class="m-l-20">
                                            <span class="text-dark font-weight-semibold"><i class="anticon anticon-clock-circle"></i> </span> 
                                            <span class="m-l-5"> <?= $item['created_at'] ?> </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php //print_r($item) ?>
                    <?php endforeach ?>

                    </ul>
                </div>

            </div>
        </div>
    </div>