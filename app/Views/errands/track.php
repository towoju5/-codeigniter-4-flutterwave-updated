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
                    <div class="col-md-8 offset mx-auto">
                        <?= form_open() ?>
                        <div class="form-group">
                            <input type="text" class="form-control" name="track_id" id="track_id"
                                placeholder="Tracking ID">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Email Associated with order ID">
                        </div>
                        <div class="text-center mx-auto">
                            <button type="submit" class="btn btn-primary btn-tone">
                                Track ASAP
                            </button>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>