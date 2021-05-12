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
                            <label class="col-sm-4 col-form-label">Cargo's Value in NGN</label>
                            <div class="col-md input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">₦</div>
                                </div>
                                <input type="number" name="cargo_value" class="form-control"
                                    placeholder="How much is your Cargo's Worth in Naira">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Delivery State</label>
                            <div class="col-md">
                                <select name="state" id="state" class="form-control">
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

                        <div class="text-center mx-auto">
                            <button type="submit" class="btn btn-tone btn-primary btn-lg">
                                Calculate
                            </button>
                        </div>

                        <?= form_close() ?>
                    </div>
                    <div class="col-md-8 offset mx-auto pt-3">
                        <?php if(isset($price) && $insur != null): ?>
                            <div class="card">
                                <div class="card-body row py-3">
                                    <div class="col-md-6">
                                        <div class="card-title">
                                            <h4 class="text-left">Delivery Address:</h4>
                                        </div>
                                        <p class="py-0 my-0">State: <?= $delivery_state ?> </p>
                                        <p class="py-0 my-0">Date:  <?= date('d M Y') ?> </p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-title">
                                            <h4 class="mr-auto">Payment Info:</h4>
                                        </div> 
                                        <p class="py-0 my-0">Order Fee: ₦<?= number_format ( $price - $insur - $vat, 2 )  ?></p>
                                        <p class="py-0 my-0">Insurance Fee(1%): ₦<?= number_format ( $insur, 2 ) ?></p>
                                        <p class="py-0 my-0">VAT Fee(7.5%): ₦<?= number_format ( $vat, 2 )  ?></p>
                                        <p class="py-0 my-0">Total Fee: ₦<?= number_format ( $price, 2 )  ?></p>
                                    </div>
                                </div>
                            </div>                                                                              
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>

<!-- Delivery Address:
Ekiti State
Gbonyin L.G.A
898
############################
Payment Info:
Order Fee: ₦3,799.66

Insurance Fee(1%): ₦0.34

VAT Fee(7.5%): ₦285.00

Total Fee: ₦4,085.00 -->
    </div>
</div>