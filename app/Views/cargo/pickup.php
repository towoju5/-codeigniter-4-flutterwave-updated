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

                <?php foreach ($centers as $val) : ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col">State: <?= $val['location_name'] ?></div>
                                    <div class="col">Address: <?= $val['address'] ?></div>
                                    <div class="col">Details: <?= $val['details'] ?></div>
                                </div>
                                <div class="col-md-6 text-right">
                                    <div class="col">Phone Number: 
                                        <a href="tel:<?= $val['phone'] ?>">
                                            <button class="btn btn-primary btn-tone">
                                                <?= $val['phone'] ?>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>