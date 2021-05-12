<?php namespace App\Models;

use CodeIgniter\Model;

class CargoModel extends Model
{
    protected $table      = 'cargos';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['user_id','cargo_state','cargo_name','cargo_location','cargo_content','cargo_numbers','cargo_weight','cargo_value','delivery_state','delivery_lga','delivery_town','phone','delivery_type', 'price', 'arrival_date', 'vat', 'insurance', 'cargo_model', 'created_at', 'updated_at', 'deleted_at'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}