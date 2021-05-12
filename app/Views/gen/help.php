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
                    <?= form_open() ?>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control" id="inputEmail" placeholder="support@deliverasap.ng">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Fullname">Fullname</label>
                                <input type="text" class="form-control" name="fullname" placeholder="John Doe">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Subject">Subject</label>
                            <input type="text" class="form-control" name="subject" placeholder="A Single line summary of the issue">
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <textarea class="form-control" cols="5" rows="5" name="message" placeholder="Please explain the issue you're facing as detailed as possibled."></textarea>
                        </div>

                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary btn-lg"> Send </button>
                        </div>
                    <?= form_close() ?>
                </div>
                <div class="card card-body pt-3">
                    <div class="card-title text-center pb-0 mb-0">
                        <h3>Our FAQs</h3>
                    </div>
                    <div class="accordion borderless" id="accordion-borderless">
                        <?php $i=1; $j=1; foreach ($faqs as $faq): ?>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">
                                        <a data-toggle="collapse" href="#collapseOneBorderless<?= $i++ ?>">
                                            <span><?= $faq['title'] ?></span>
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseOneBorderless<?= $j++ ?>" class="collapse" data-parent="#accordion-borderless">
                                    <div class="card-body">
                                       <p><?= $faq['message'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>