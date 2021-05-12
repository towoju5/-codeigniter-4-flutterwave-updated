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
                                        <table id="data-table" class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Customer</th>
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>#5331</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-image" style="height: 30px; min-width: 30px; max-width:30px">
                                                                    <img src="<?= base_url() ?>/assets/images/avatars/thumb-1.jpg" alt="">
                                                                </div>
                                                                <h6 class="m-l-10 m-b-0">Erin Gonzales</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>8 May 2019</td>
                                                    <td>$137.00</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge badge-success badge-dot m-r-10"></span>
                                                            <span class="btn btn-primary">Approved</span>
                                                        </div>
                                                    </td>
                                                </tr>
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