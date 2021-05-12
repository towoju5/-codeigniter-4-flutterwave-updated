<!-- page css -->
<link href="<?= base_url() ?>/assets/vendors/datatables/dataTables.bootstrap.min.css" rel="stylesheet">
<!-- Content Wrapper START -->
<div class="main-content">
    <div class="page-header">
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="#" class="breadcrumb-item">
                    <i class="anticon anticon-home m-r-5"></i>
                    Dasboard
                </a>
                <span class="breadcrumb-item active">
                    <?= $page ?>
                </span>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?= $title ?></h4>
            </div>
            <div class="card-body">
                <table id="data-table" class="table table-responsive-md">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; while($i < 25 ){ ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- page js -->
<script src="<?= base_url() ?>/assets/vendors/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/vendors/datatables/dataTables.bootstrap.min.js"></script>
<script>
$('#data-table').DataTable();
</script>