<?php namespace App\Models;

use CodeIgniter\Model;
/**
 * UserModel which will be used in our User Controller
 */

class PickUp extends Model
{
    protected $table      = 'pick_up';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['location_name', 'address', 'details', 'phone', 'created_at', 'updated_at', 'deleted_at'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}