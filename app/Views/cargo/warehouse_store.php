<!-- Content Wrapper START -->
<div class="main-content">
    <div class="page-header">
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Dasboard</a>
                <span class="breadcrumb-item active"><?= $title ?></span>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= "Yes My Cargo has Arrived" ?></h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset mx-auto">
                        <?= form_open() ?>
                        
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"> Cargo arrival date</label>
                            <div class="col-md">
                                <input type="date" class="form-control" data-date-format="dd-mm-yyyy" name="arrival_date" id="arrival_date" placeholder=" Cargo Arrival Date">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">PickUp Cargo Name</label>
                            <div class="col-md">
                                <input type="text" class="form-control" name="cargo_name" id="cargo_name" placeholder="PickUp Cargo Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">PickUp Cargo Location</label>
                            <div class="col-md">
                                <input type="text" class="form-control" name="cargo_location" id="cargo_location" placeholder="Pick Up Cargo Location">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Cargo Content's</label>
                            <div class="col-md">
                                <input type="text" name="cargo_content" class="form-control" placeholder="Cargo Content">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">No of Cargo's?</label>
                            <div class="col-md">
                                <input type="number" class="form-control" name="cargo_numbers" id="numbers_of_cargo" placeholder="Number's of packages/cargo">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Cargo's Weight</label>
                            <div class="col-md input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">kg</div>
                                </div>
                                <input type="text" name="cargo_weight" class="form-control" placeholder="Total Weight of all Cargo">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Value of Cargo</label>
                            <div class="col-md input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"> ₦</div>
                                </div>
                                <input type="number" name="cargo_value" class="form-control" id="worth_of_cargo" placeholder="How much is your Cargo's Worth in Naira">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Phone Number</label>
                            <div class="col-md">
                                <input type="number" name="phone" value="" class="form-control" placeholder="Phone Number">
                            </div>
                        </div>

                        <div class="text-center mx-auto">
                            <button type="submit" class="btn btn-lg btn-tone btn-primary">
                                Submit Request
                            </button>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#arrival_date').datetimepicker({
            format: 'YYYY-MM-DD hh:mm'
        });
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/assets/js/lga.min.js"></script>