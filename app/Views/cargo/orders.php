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
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="card">
                            <div class="card-body">
                                <div class="m-t-0">
                                    <div class="table-responsive">
                                        <table id="data-table" class="table  table-responsive-md">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Order Details</th>
                                                    <th>Amount</th>
                                                    <th>Order Model</th>
                                                    <th>Action.</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i=1; foreach($orders as $order): ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td>
                                                        <?= "Cargo Name: ". $order['cargo_name'] ?>, 
                                                        <?= "Cargo Location: ". $order['cargo_location'] ?>, 
                                                        <?= "Cargo Content: ". $order['cargo_content'] ?>, 
                                                        <?= "Cargo Weight: ". $order['cargo_weight'] ?>, 
                                                    </td>
                                                    <td><?= $order['price'] ?></td>
                                                    <td>
                                                        <?php if($order['cargo_model'] === 'has_arrived'){
                                                        echo "Arrived";
                                                        }  elseif ($order['cargo_model'] === 'pending_arrival') {
                                                            echo "Pending Arrival";
                                                        } elseif ($order['cargo_model'] === 'warehouse_store') {
                                                            echo "Store in Warehouse";
                                                        } ?>
                                                            
                                                    </td>
                                                    <td>
                                                        <? if ($order['payment_status'] === '0'): ?>
                                                            <a href='<?= base_url("cargo/payment/{$order['id']}") ?>'><button class='btn btn-tone btn-sm btn-primary'><i class="fab fa-paypal"></i></button></a>
                                                        <?php else: ?>
                                                            <a href='<?= base_url("cargo/view/{$order['id']}") ?>'><button class='btn btn-tone btn-sm btn-primary'><i class="fas fa-eye"></i></button></a>
                                                        <?php endif ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>