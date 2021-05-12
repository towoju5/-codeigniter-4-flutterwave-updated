<!-- payWithPaystack js -->
<script src="https://js.paystack.co/v1/inline.js"></script>
<!-- PayWithRave js -->
<script src="https://checkout.flutterwave.com/v3.js"></script>


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
        <div class="col-8 mx-auto card">
            <?php //echo "<pre>". print_r(user()) ."</pre>" ?>
            <div class="card-body">
              <?php if(isset($item) && $item > 0) : ?>
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center">Payment for: <?= $item['cargo_content'] ?></h1>
                        <h6 class="text-center">Created on: <?= $item['created_at'] ?></h6>
                        <hr>
                    </div>
                    <?php if($item['delivery_type'] == 'Home Delivery'): ?>
                        <!-- // Show form to request for Delivery Address -->
                        <div class="col-md-12">
                            <h4 class="text-center">Please provide your delivery address</h4>
                            <?= form_open() ?>
                            <div class="input-group mb-4 row">
                                <label for="mode" class="col-sm-3 col-form-label">Delivery Address</label>
                                <div class="input-group-prepend col-sm-9">
                                    <textarea name="address"
                                        placeholder="Please provide your full delivery address in a readable format" id="address"
                                        class="form-control" required cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <?= form_close() ?>
                        <hr>
                        </div>
                    <?php endif ?>
                    <div class="col-md-6">
                        <div class="card-title">
                            <h4 class="text-left">Delivery Address:</h4>
                        </div>
                        <p class="py-0 my-0"><?= $item['delivery_state'] ?> State</p>
                        <p class="py-0 my-0"><?= $item['delivery_lga'] ?> L.G.A</p>
                        <p class="py-0 my-0"><?= $item['delivery_town'] ?></p>
                    </div>
                    <div class="col-md-6">
                        <div class="card-title">
                            <h4 class="mr-auto">Payment Info:</h4>
                        </div> 
                        <p class="py-0 my-0">Order Fee: ₦<?= number_format ( $item['price']-$item['insurance']-$item['vat'], 2 )  ?></p>
                        <p class="py-0 my-0">Insurance Fee(1%): ₦<?= number_format ( $item['insurance'], 2 ) ?></p>
                        <p class="py-0 my-0">VAT Fee(7.5%): ₦<?= number_format ( $item['vat'], 2 )  ?></p>
                        <p class="py-0 my-0">Total Fee: ₦<?= number_format ( $item['price'], 2 )  ?></p>
                    </div>
                    <div class="col-12 mt-3">
                        <hr>
                        <p class="h4 text-center">Select Your Desire Payment Method</p>
                        <?php if($item['payment_status'] == 0): ?>
                        <div class="row mx-auto">
                            <div class="col-4">
                                <?= form_open() ?>
                                <input type="text" hidden name="address" value="">
                                <input type="text" hidden name="order_id" value="<?= $item['id'] ?>">
                                <input type="text" hidden name="gateway" value="rave">
                                    <button class="btn btn-primary" type="submit">Flutterwave</button>
                            </div>
                                <?= form_close() ?>

                            <div class="col-4">
                                <?= form_open() ?>
                                <input type="text" hidden name="address">
                                <input type="text" hidden name="order_id" value="<?= $item['id'] ?>">
                                <input type="text" hidden name="gateway" value="balance">
                                    <button class="btn btn-primary" type="submit">Wallet Ballance</button>
                                <?= form_close() ?>
                                    <!-- <button class="btn btn-primary" onclick="checkPayStack()" type="button">PayStack</button> -->
                            </div>

                                    <!-- <button class="btn btn-primary" onclick="checkPayRave()" type="button">Flutterwave</button> -->
                            <!-- </div> -->
                            <div class="col-4">
                                <?= form_open() ?>
                                <input type="text" hidden name="address">
                                <input type="text" hidden name="order_id" value="<?= $item['id'] ?>">
                                <input type="text" hidden name="gateway" value="paystack">
                                    <button class="btn btn-primary" type="submit">PayStack</button>
                                <?= form_close() ?>
                                    <!-- <button class="btn btn-primary" onclick="checkPayStack()" type="button">PayStack</button> -->
                            </div>
<!-- js goes here -->


<!-- payWithPaystack -->
<script>
   function checkPayStack(){
       if(document.getElementById('address').value == ""){
            alert('Please Provide Shipping address');
       } else {
            payWithPaystack();
       }
   }

   function checkPayRave(){
       if(document.getElementById('address').value == ""){
            alert('Please Provide Shipping address');
       } else {
            payWithRave();
       }
   }

  function payWithPaystack(){
    let address = document.getElementById('address').value;
    var handler = PaystackPop.setup({
      key: '<?= $paystack_public ?>',
      email: '<?= user()->email ?>',
      amount: "<?= $item['price']*100 ?>",
      currency: "NGN",
      ref: 'DELIVERASAP'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "<?= $item['cargo_content'] ?>",
                variable_name: "<?= $item['phone'] ?>",
                value: "+2348012345678",
                order_id:   "<?= $item['id'] ?>",
                cust_address: address
            }
         ]
      },
      callback: function(response){
          window.location.href="<?= base_url('payment/verify/paystack?ref=') ?>" + response.reference;
        //   alert('success. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }

// <!-- PayWithRave -->

function payWithRave() {
    let address = document.getElementById('address').value;
    FlutterwaveCheckout({
      public_key: "FLWPUBK_TEST-SANDBOXDEMOKEY-X",
      tx_ref: 'DELIVERASAP'+Math.floor((Math.random() * 1000000000) + 1),
      amount: "<?= $item['price'] ?>",
      currency: "NGN",
      country: "NG",
      payment_options: "card, mobilemoneyghana, ussd",
      redirect_url: // specified redirect URL
        "https://callbacks.piedpiper.com/flutterwave.aspx?ismobile=34",
      meta: {
        cust_address: address
      },
      customer: {
        email: "<?= user()->email ?>",
        phone_number: "<?= $item['phone'] ?>",
        name: "<?= session()->get('fullname') ?>",
      },
      callback: function (data) {
        console.log(data);
      },
      onclose: function() {
        // close modal
      },
      customizations: {
        title: "My store",
        description: "Payment for items in cart",
        logo: "https://assets.piedpiper.com/logo.png",
      },
    });
  }
</script>




                        </div>
                        <?php else: ?>
                            <h1 class="text-center">You already paid for this Order</h1>
                        <?php endif ?>
                    </div>
                </div>
                <?php else: ?>
                  <h1>Invalid Order URL</h1>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
