<script>
function checkPayStack() {
    if (document.getElementById('address').value == "") {
        alert('Please Provide Shipping address');
    } else {
        payWithPaystack();
    }
}

function checkPayRave() {
    if (document.getElementById('address').value == "") {
        alert('Please Provide Shipping address');
    } else {
        payWithRave();
    }
}

function payWithPaystack() {
    let address = document.getElementById('address').value;
    var handler = PaystackPop.setup({
        key: '<?= $paystack_public ?>',
        email: '<?= session()->get('email') ?>',
        amount: "<?= $item['price']*100 ?>",
        currency: "NGN",
        ref: 'DELIVERASAP' + Math.floor((Math.random() * 1000000000) +
        1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        metadata: {
            custom_fields: [{
                display_name: "<?= $item['cargo_content'] ?>",
                variable_name: "<?= $item['phone'] ?>",
                value: "+2348012345678",
                order_id: "<?= $item['id'] ?>",
                cust_address: address
            }]
        },
        callback: function(response) {
            window.location.href = "<?= base_url('payment/verify/paystack?ref=') ?>" + response.reference;
            //   alert('success. transaction ref is ' + response.reference);
        },
        onClose: function() {
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
        tx_ref: 'DELIVERASAP' + Math.floor((Math.random() * 1000000000) + 1),
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
            email: "<?= session()->get('email') ?>",
            phone_number: "<?= $item['phone'] ?>",
            name: "<?= session()->get('fullname') ?>",
        },
        callback: function(data) {
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