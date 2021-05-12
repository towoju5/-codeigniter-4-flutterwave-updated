<?php namespace App\Models;

use CodeIgniter\Model;
/**
 * UserModel which will be used in our User Controller
 */

class Cal extends Model
{
    protected $table = 'orders';

    function handling_fee($weight)
    {
        // calculate handling fee and return value
        if($weight < 5){
            return $handling_fee = 1500;
        } elseif ($weight >= 5 && $weight < 15 ){
            return $handling_fee = 2000;
        } elseif ($weight >= 15 && $weight < 30){
            return $handling_fee = 3000;
        } elseif ($weight >= 30 && $weight < 50){
            return $handling_fee = 4000;
        } elseif ($weight >= 50 && $weight < 75){
            return $handling_fee = 5000;
        } else {
            return $handling_fee = 7500;
        }
    }

    function delivery_fee($weight)
    {
        // calculate handling fee and return value

        if($weight < 3){
            return $delivery_fee = 300;
        } elseif ($weight >= 3 && $weight < 40 ){
            return $delivery_fee = 200;
        } elseif ($weight >= 40 && $weight < 50){
            return $delivery_fee = 150;
        } elseif($weight >= 50) {
            return $delivery_fee = 100;
        }
    }

    function waybill($weight, $state)
    {
        # waybill calculation based on weight.
        $south_south    =   ['Akwa Ibom','Bayelsa','Cross River','Delta','Edo','Rivers'];
        $north          =   ['Zamfara','Kano','Kebbi','Katsina','Sokoto','Kaduna','Jigawa','Niger','Adamawa','Kebbi','Borno','Bauchi','Kogi','Nasarawa','Taraba','Yobe','Plateu','Gombe'];
        $south_west     =   ['Abuja','Kwara','Ekiti','Lagos','Ogun','Ondo','Osun','Oyo'];
        $south_east     =   ['Abia','Anambra','Ebonyi','Enugu','Imo'];

        if($weight < 5 && (!in_array($state, $north))){
            return $waybill_fee = 2000;
        } elseif($weight < 5 && in_array($state, $north, TRUE)){
            return $waybill_fee = 2400;
        } elseif(($weight >= 5  && $weight < 10) && (!in_array($state, $north))){
            return $waybill_fee = 2500;
        } elseif(($weight >= 5  && $weight < 10) && in_array($state, $north)){
            return $waybill_fee = 3000;
        } elseif($weight >= 10 && $weight < 15 && (!in_array($state, $north))){
            return $waybill_fee = 5000;
        } elseif($weight >= 10 && $weight < 15 && in_array($state, $north, TRUE)){
            return $waybill_fee = 6000;
        } elseif($weight >= 15 && $weight < 20 && (!in_array($state, $north))){
            return $waybill_fee = 6000;
        } elseif($weight >= 15 && $weight < 20 && in_array($state, $north, TRUE)){
            return $waybill_fee = 7200;
        } elseif($weight >= 20 && $weight < 30 && (!in_array($state, $north))){
            return $waybill_fee = 9000;
        } elseif($weight >= 20 && $weight < 30 && in_array($state, $north, TRUE)){
            return $waybill_fee = 10800;
        } elseif($weight >= 30 && $weight < 40 && (!in_array($state, $north))){
            return $waybill_fee = 12000;
        } elseif($weight >= 30 && $weight < 40 && in_array($state, $north, TRUE)){
            return $waybill_fee = 14400;
        } elseif($weight >= 40 && $weight < 50 && (!in_array($state, $north))){
            return $waybill_fee = 15000;
        } elseif($weight >= 40 && $weight < 50 && in_array($state, $north, TRUE)){
            return $waybill_fee = 18000;
        } elseif($weight >= 50 && $weight < 75 && (!in_array($state, $north))){
            return $waybill_fee = 20000;
        } elseif($weight >= 50 && $weight < 75 && in_array($state, $north, TRUE)){
            return $waybill_fee = 24000;
        } elseif($weight >= 75 && $weight < 100 && (!in_array($state, $north))){
            return $waybill_fee = 25000;
        } elseif($weight >= 75 && $weight < 100 && in_array($state, $north, TRUE)){
            return $waybill_fee = 30000;
        } elseif($weight >= 100 && (!in_array($state, $north))){
            return $waybill_fee = 30000;
        } elseif($weight >= 100 && in_array($state, $north, TRUE)){
            return $waybill_fee = 36000;
        }
    }

    // Payment Gateway cURL OPT goes here.

    function paystack($data, $seck)
    {
        $url = "https://api.paystack.co/transaction/initialize";
        $fields_string = http_build_query($data);
        //open connection
        $ch = curl_init();
        
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer SECRET_KEY",
            "Cache-Control: no-cache",
        ));
        
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        
        //execute post
        $result = curl_exec($ch);
        return $result;
    }

    function rave($data){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.flutterwave.com/v3/payments",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Authorization: Bearer FLWSECK_TEST-SANDBOXDEMOKEY-X"
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response, true);
        return $response;
    }
}