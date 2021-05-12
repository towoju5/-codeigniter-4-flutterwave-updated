<?php namespace App\Models;

use CodeIgniter\Model;
/**
 * UserModel which will be used in our User Controller
 */

class History extends Model
{
    protected $table      = 'history';
    protected $allowedFields = ['user_id', 'tranx_type', 'amount', 'created_at', 'updated_at', 'deleted_at'];

    protected $useSoftDeletes 	= true;
    protected $useTimestamps 	= false;
    protected $createdField  	= 'created_at';
    protected $updatedField  	= 'updated_at';
    protected $deletedField  	= 'deleted_at';

}