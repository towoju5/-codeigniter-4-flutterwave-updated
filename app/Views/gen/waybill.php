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
                        <!-- Left Side -->
                        <div class="col-md-6 mx-auto">
                            <div class="row">
                                <div class="col-md-8"><b>Shipping Type:</b> <?= "Express Shipping" ?></div>
                                <div class="col-md-4 text-right"><?= "Logo Here" ?></div>
                                <small class="text-left ml-3"><?= date('Y-m-d') ?> MYDELIVER + 1.0/*<?= date('m')."-0821*" ?></small>
                                <hr>
                            </div>
                            <div class="row pt-1">
                                <div class="col-md-2"><b>From:</b> </div>
                                <div class="col-md-7 text-justify my-0"> 
                                    <p class="my-0">DeliverASAP Consults</p>
                                    <p class="my-0">www.deliverasap.ng</p>
                                    <p class="my-0">56, Igbogo Street, Ketu-Alapere,</p>
                                    <p class="my-0">Lagos, Nigeria</p>
                                </div>
                                <div class="col-md-3 text-right">Origin: <b>LOS</b></div>
                            </div>
                            <hr>
                            <div class="row pt-1">
                                <div class="col-md-2"><b>To:</b> </div>
                                <div class="col-md-7 text-justify my-0"> 
                                    <p class="my-0">Emmanuel Towoju</p>
                                    <p class="my-0">Emmanuel Towoju</p>
                                    <p class="my-0">6, Orientation Camp, Ayikundu,</p>
                                    <p class="my-0">Kosofe, Nigeria</p>
                                </div>
                                <div class="col-md-3 text-right">Contact: <p> Emmanuel Towoju</p></div>
                            </div>

                            <hr>

                            <div class="row pt-3">
                                <div class="col my-0">
                                    <p class="my-0 mb-2 text-center" style="font-weight: bolder;">NG-QRW-QRW</p>
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <p class="text-center">Content(s)</p>
                                                <li>1 Black Box of Weavon</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                        </div>
                    <!-- center Line -->
                        <div class="vl pl-0">Please fold here</div>
                    <!-- Right Side -->
                        <div class="col-md-5 mx-auto">
                            <div class="row">
                                <div class="col-md-6"><b>Shipping Type:</b> <?= "Express Shipping" ?></div>
                                <div class="col-md-6 text-right"><?= "Logo Here" ?></div>
                                <small class="text-left ml-3"><?= date('Y-m-d') ?> MYDELIVER + 1.0/*<?= date('m')."-0821*" ?></small>
                                <hr>
                            </div>
                            <div class="row pt-3">
                                <div class="col-md-2"><b>From:</b> </div>
                                <div class="col-md-7 text-justify my-0"> 
                                    <p class="my-0">DeliverASAP Consults</p>
                                    <p class="my-0">www.deliverasap.ng</p>
                                    <p class="my-0">56, Igbogo Street, Ketu-Alapere,</p>
                                    <p class="my-0">Lagos, Nigeria</p>
                                </div>
                                <div class="col-md-3 text-right">Origin: <b>LOS</b></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
    .vl {
      border-left: 2px dotted black;
      writing-mode:tb-rl;
      text-align:center;
    }
</style>