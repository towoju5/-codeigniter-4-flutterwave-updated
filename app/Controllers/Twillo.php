<?php

namespace App\Controllers;

class Twillo extends BaseController
{
    /* SAMPLE PAYLOAD RESPOND FROM TWILLOW.  Main function is in the cal model.
            {
                "sid": "SM0ab9b916581d483cb8f5d8c3a4d27d7f",
                "date_created": "Thu, 17 Dec 2020 16:27:34 +0000",
                "date_updated": "Thu, 17 Dec 2020 16:27:34 +0000",
                "date_sent": null,
                "account_sid": "AC0e19553df2803b287d69763b2654ae57",
                "to": "whatsapp:+19203751431",
                "from": "whatsapp:+14155238886",
                "messaging_service_sid": null,
                "body": "Your, Cargo Order has been placed successfully, you will be update on the status of your orders very soon",
                "status": "queued",
                "num_segments": "1",
                "num_media": "0",
                "direction": "outbound-api",
                "api_version": "2010-04-01",
                "price": null,
                "price_unit": null,
                "error_code": null,
                "error_message": null,
                "uri": "/2010-04-01/Accounts/AC0e19553df2803b287d69763b2654ae57/Messages/SM0ab9b916581d483cb8f5d8c3a4d27d7f.json",
                "subresource_uris": {
                    "media": "/2010-04-01/Accounts/AC0e19553df2803b287d69763b2654ae57/Messages/SM0ab9b916581d483cb8f5d8c3a4d27d7f/Media.json"
                    }
            } 
        */
    function index($name,$date,$order_id)
    {
        
        $name = "Nameless";
        $date = date('d/m/Y H:i:s');
        $order_id = "DELIVERASAP90398";

        $conversation = $this->twilio->messages 
                            ->create("whatsapp:+19203751431", // to 
                 array( 
                     "from" => "whatsapp:+14155238886",       
                     "body" => "Hi $name, thanks for your order $order_id placed on $date. Your order has shipped. You can get a tracking update any time by replying TRACK." 
                 ) 
        ); 

        print($conversation->sid);

        if ($conversation) {
            return redirect()->to(base_url('cargo/dashboard'))->with('success','Sent Successfully');
        } else {
            return redirect()->back()->with('success','Sent Successfully');
        }
    }
}
