<!-- Content Wrapper START -->
<div class="main-content">
    <div class="page-header no-gutters has-tab">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#tab-account">Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#passkey">Change Password</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#api">API Keys</a>
            </li>
        </ul>
    </div>
    <div class="container">
        <div class="tab-content m-t-15">
            <div class="tab-pane fade show active" id="tab-account">
                <!-- //Basic Information -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic Infomation</h4>
                    </div>
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-image  m-h-10 m-r-15" style="height: 80px; width: 80px">
                                <img src="assets/images/avatars/thumb-3.jpg" alt="">
                            </div>
                            <div class="m-l-20 m-r-20">
                                <h5 class="m-b-5 font-size-18">Change Avatar</h5>
                                <p class="opacity-07 font-size-13 m-b-0">
                                    Recommended Dimensions: <br>
                                    120x120 Max fil size: 5MB
                                </p>
                            </div>
                            <div>
                                <button class="btn btn-tone btn-primary">Upload</button>
                            </div>
                        </div>
                        <hr class="m-v-25">
                        <form>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="font-weight-semibold" for="userName">Company Name:</label>
                                    <input type="text" class="form-control" id="userName" placeholder="Company Name:"
                                        value="Marshall Nichols">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-semibold" for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" placeholder="email"
                                        value="myemail@company.com">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="font-weight-semibold" for="phoneNumber">Phone Number:</label>
                                    <input type="number" class="form-control" id="phoneNumber" placeholder="0903 939 5114">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="font-weight-semibold" for="dob">Date of Birth:</label>
                                    <input type="date" class="form-control" id="dob" placeholder="Date of Birth">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="font-weight-semibold" for="language">Language</label>
                                    <select id="language" class="form-control">
                                        <option>English</option>
                                        <option>France</option>
                                        <option>German</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- //Change Password -->
                <section id="passkey">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Change Password</h4>
                        </div>
                        <div class="card-body">
                            <?= form_open() ?>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label class="font-weight-semibold" for="oldPassword">Old Password:</label>
                                        <input type="password" class="form-control" id="oldPassword"
                                            placeholder="Old Password">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="font-weight-semibold" for="newPassword">New Password:</label>
                                        <input type="password" class="form-control" id="newPassword"
                                            placeholder="New Password">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="font-weight-semibold" for="confirmPassword">Confirm
                                            Password:</label>
                                        <input type="password" class="form-control" id="confirmPassword"
                                            placeholder="Confirm Password">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <button type="submit" class="btn btn-primary m-t-30">Change</button>
                                    </div>
                                </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </section>
                <!-- //API Keys -->
                <section id="api">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">API Keys</h4>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-semibold" for="fullAddress">Full Address:</label>
                                        <input type="text" class="form-control" id="fullAddress"
                                            placeholder="Full Address">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-semibold" for="stateCity">State & City:</label>
                                        <input type="text" class="form-control" id="stateCity"
                                            placeholder="State & City">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-semibold" for="language">Language</label>
                                        <select id="language-2" class="form-control">
                                            <option>United State</option>
                                            <option>United Kingdom</option>
                                            <option>France</option>
                                            <option>German</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<!-- Content Wrapper END -->