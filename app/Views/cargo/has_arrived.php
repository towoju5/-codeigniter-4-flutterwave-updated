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
                <h3 class="card-title"><?= "Yes My Cargo has Arrived" ?></h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset mx-auto">
                        <?= form_open() ?>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Delivery State</label>
                            <div class="col-md">
                                <input type="text" class="form-control" name="cargo_state" id="cargo_state"
                                    placeholder="Which State are you Delivering the Cargo to?">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">PickUp Cargo Name</label>
                            <div class="col-md">
                                <input type="text" class="form-control" name="cargo_name" id="cargo_name"
                                    placeholder="PickUp Cargo Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">PickUp Cargo Location</label>
                            <div class="col-md">
                                <input type="text" class="form-control" name="cargo_location" id="cargo_location"
                                    placeholder="Pick Up Cargo Location">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Cargo Content's</label>
                            <div class="col-md">
                                <input type="text" name="cargo_content" class="form-control"
                                    placeholder="Cargo Content">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">No of Cargo's?</label>
                            <div class="col-md">
                                <input type="number" class="form-control" name="cargo_numbers" id="numbers_of_cargo"
                                    placeholder="Number's of packages/cargo">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Cargo's Weight</label>
                            <div class="col-md input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">kg</div>
                                </div>
                                <input type="number" name="cargo_weight" class="form-control"
                                    placeholder="Total Weight of all Cargo">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Value of Cargo</label>
                            <div class="col-md input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"> ₦</div>
                                </div>
                                <input type="number" name="cargo_value" class="form-control" id="worth_of_cargo"
                                    placeholder="How much is your Cargo's Worth in Naira">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Delivery State</label>
                            <div class="col-md">
                                <select onchange="toggleLGA(this);" name="state" id="state" class="form-control">
                                    <option value="" selected="selected">- Select State -</option>
                                    <option value="Abia">Abia</option>
                                    <option value="Adamawa">Adamawa</option>
                                    <option value="AkwaIbom">AkwaIbom</option>
                                    <option value="Anambra">Anambra</option>
                                    <option value="Bauchi">Bauchi</option>
                                    <option value="Bayelsa">Bayelsa</option>
                                    <option value="Benue">Benue</option>
                                    <option value="Borno">Borno</option>
                                    <option value="Cross River">Cross River</option>
                                    <option value="Delta">Delta</option>
                                    <option value="Ebonyi">Ebonyi</option>
                                    <option value="Edo">Edo</option>
                                    <option value="Ekiti">Ekiti</option>
                                    <option value="Enugu">Enugu</option>
                                    <option value="FCT">FCT</option>
                                    <option value="Gombe">Gombe</option>
                                    <option value="Imo">Imo</option>
                                    <option value="Jigawa">Jigawa</option>
                                    <option value="Kaduna">Kaduna</option>
                                    <option value="Kano">Kano</option>
                                    <option value="Katsina">Katsina</option>
                                    <option value="Kebbi">Kebbi</option>
                                    <option value="Kogi">Kogi</option>
                                    <option value="Kwara">Kwara</option>
                                    <option value="Lagos">Lagos</option>
                                    <option value="Nasarawa">Nasarawa</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Ogun">Ogun</option>
                                    <option value="Ondo">Ondo</option>
                                    <option value="Osun">Osun</option>
                                    <option value="Oyo">Oyo</option>
                                    <option value="Plateau">Plateau</option>
                                    <option value="Rivers">Rivers</option>
                                    <option value="Sokoto">Sokoto</option>
                                    <option value="Taraba">Taraba</option>
                                    <option value="Yobe">Yobe</option>
                                    <option value="Zamfara">Zamafara</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Select L.G.A</label>
                            <div class="col-md">
                                <select name="lga" id="lga" class="form-control select-lga">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <input type="text" hidden>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Delivery Town</label>
                            <div class="col-md">
                                <input type="text" name="delivery_town" class="form-control" id="delivery_town"
                                    placeholder="Which town are we deliverying too?">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Phone Number</label>
                            <div class="col-md">
                                <input type="number" name="phone" class="form-control" placeholder="Phone Number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Delivery Type</label>
                            <div class="col-sm row">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="delivery_type1" name="delivery_type" value="Pick Up"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="delivery_type1">Pick Up</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="delivery_type2" name="delivery_type" value="Home Delivery"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="delivery_type2">Home Delivery</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="delivery_type3" name="delivery_type" value="Park Delivery"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="delivery_type3">Park Delivery</label>
                                </div>
                            </div>
                        </div>

                        <div id="pick_up" style=>
                            content of B2C
                        </div>
                        <div id="home_delivery">
                            content of B2B
                        </div>
                        <div id="park_delivery">
                            park_delivery
                        </div>


                        <div class="text-center mx-auto">
                            <button type="submit" class="btn btn-primary btn-tone">
                                Add Cargo Pickup
                            </button>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Javascript for select State + LGA -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/assets/js/lga.min.js"></script>