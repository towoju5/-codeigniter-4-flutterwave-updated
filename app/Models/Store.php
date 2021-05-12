<?php namespace App\Models;

use CodeIgniter\Model;
/**
 * UserModel which will be used in our User Controller
 * 
 * 
 * 
 * 
 * Reduce Handling by 50%
 * Reduce waybill by 25%
 * 
 * 
 */

class Store extends Model
{
    protected $table = 'users';
    function handling_fee($weight)
    {
        // calculate handling fee and return value      // 
        if($weight < 5){
            $handling_fee = 1500;
            $resp = $this->fifty($handling_fee);
            return $resp;
        } elseif ($weight >= 5 && $weight < 15 ){
            $handling_fee = 2000;
            $resp = $this->fifty($handling_fee);
            return $resp;
        } elseif ($weight >= 15 && $weight < 30){
            $handling_fee = 3000;
            $resp = $this->fifty($handling_fee);
            return $resp;
        } elseif ($weight >= 30 && $weight < 50){
            $handling_fee = 4000;
            $resp = $this->fifty($handling_fee);
            return $resp;
        } elseif ($weight >= 50 && $weight < 75){
            $handling_fee = 5000;
            $resp = $this->fifty($handling_fee);
            return $resp;
        } else {
            $handling_fee = 7500;
            $resp = $this->fifty($handling_fee);
            return $resp;
        }
    }

    function delivery_fee($weight)
    {
        // calculate handling fee and return value

        if($weight < 3){
            $delivery_fee = 300;
            $resp = $this->twenty_five($delivery_fee);
            return $resp;
        } elseif ($weight >= 3 && $weight < 40 ){
            $delivery_fee = 200;
            $resp = $this->twenty_five($delivery_fee);
            return $resp;
        } elseif ($weight >= 40 && $weight < 50){
            $delivery_fee = 150;
            $resp = $this->twenty_five($delivery_fee);
            return $resp;
        } elseif($weight >= 50) {
            $delivery_fee = 100;
            $resp = $this->twenty_five($delivery_fee);
            return $resp;
        }
    }

    function waybill($weight, $state)
    {
        # waybill calculation based on weight. Reduced by 25%
        $south_south    =   ['Akwa Ibom','Bayelsa','Cross River','Delta','Edo','Rivers'];
        $north          =   ['Zamfara','Kano','Kebbi','Katsina','Sokoto','Kaduna','Jigawa','Niger','Adamawa','Kebbi','Borno','Bauchi','Kogi','Nasarawa','Taraba','Yobe','Plateu','Gombe'];
        $south_west     =   ['Abuja','Kwara','Ekiti','Lagos','Ogun','Ondo','Osun','Oyo'];
        $south_east     =   ['Abia','Anambra','Ebonyi','Enugu','Imo'];

        if($weight < 5 && (!in_array($state, $north))){
            $waybill_fee = 2000;
            $resp = $this->twenty_five($waybill_fee);
            return $resp;
        } elseif($weight < 5 && in_array($state, $north, TRUE)){
            $waybill_fee = 2400;
            $resp = $this->twenty_five($waybill_fee);
            return $resp;
        } elseif(($weight >= 5  && $weight < 10) && (!in_array($state, $north))){
            $waybill_fee = 2500;
            $resp = $this->twenty_five($waybill_fee);
            return $resp;
        } elseif(($weight >= 5  && $weight < 10) && in_array($state, $north)){
            $waybill_fee = 3000;
            $resp = $this->twenty_five($waybill_fee);
            return $resp;
        } elseif($weight >= 10 && $weight < 15 && (!in_array($state, $north))){
            $waybill_fee = 5000;
            $resp = $this->twenty_five($waybill_fee);
            return $resp;
        } elseif($weight >= 10 && $weight < 15 && in_array($state, $north, TRUE)){
            $waybill_fee = 6000;
            $resp = $this->twenty_five($waybill_fee);
            return $resp;
        } elseif($weight >= 15 && $weight < 20 && (!in_array($state, $north))){
            $waybill_fee = 6000;
            $resp = $this->twenty_five($waybill_fee);
            return $resp;
        } elseif($weight >= 15 && $weight < 20 && in_array($state, $north, TRUE)){
            $waybill_fee = 7200;
            $resp = $this->twenty_five($waybill_fee);
            return $resp;
        } elseif($weight >= 20 && $weight < 30 && (!in_array($state, $north))){
            $waybill_fee = 9000;
            $resp = $this->twenty_five($waybill_fee);
            return $resp;
        } elseif($weight >= 20 && $weight < 30 && in_array($state, $north, TRUE)){
            $waybill_fee = 10800;
            $resp = $this->twenty_five($waybill_fee);
            return $resp;
        } elseif($weight >= 30 && $weight < 40 && (!in_array($state, $north))){
            $waybill_fee = 12000;
            $resp = $this->twenty_five($waybill_fee);
            return $resp;
        } elseif($weight >= 30 && $weight < 40 && in_array($state, $north, TRUE)){
            $waybill_fee = 14400;
            $resp = $this->twenty_five($waybill_fee);
            return $resp;
        } elseif($weight >= 40 && $weight < 50 && (!in_array($state, $north))){
            $waybill_fee = 15000;
            $resp = $this->twenty_five($waybill_fee);
            return $resp;
        } elseif($weight >= 40 && $weight < 50 && in_array($state, $north, TRUE)){
            $waybill_fee = 18000;
            $resp = $this->twenty_five($waybill_fee);
            return $resp;
        } elseif($weight >= 50 && $weight < 75 && (!in_array($state, $north))){
            $waybill_fee = 20000;
            $resp = $this->twenty_five($waybill_fee);
            return $resp;
        } elseif($weight >= 50 && $weight < 75 && in_array($state, $north, TRUE)){
            $waybill_fee = 24000;
            $resp = $this->twenty_five($waybill_fee);
            return $resp;
        } elseif($weight >= 75 && $weight < 100 && (!in_array($state, $north))){
            $waybill_fee = 25000;
            $resp = $this->twenty_five($waybill_fee);
            return $resp;
        } elseif($weight >= 75 && $weight < 100 && in_array($state, $north, TRUE)){
            $waybill_fee = 30000;
            $resp = $this->twenty_five($waybill_fee);
            return $resp;
        } elseif($weight >= 100 && (!in_array($state, $north))){
            $waybill_fee = 30000;
            $resp = $this->twenty_five($waybill_fee);
            return $resp;
        } elseif($weight >= 100 && in_array($state, $north, TRUE)){
            $waybill_fee = 36000;
            $resp = $this->twenty_five($waybill_fee);
            return $resp;
        }
    }


    function twenty_five($value)
    {
        $percentage = 25;
        $cur_price  = $value;
        $new_price  = ($percentage / 100) * $cur_price;

        return $new_price;

    }


    function fifty($value)
    {
        $percentage = 50;
        $cur_price  = $value;
        $new_price  = ($percentage / 100) * $cur_price;

        return $new_price;

    }
}