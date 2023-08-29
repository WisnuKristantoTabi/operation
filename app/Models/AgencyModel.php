<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class AgencyModel extends Model{
    protected $table = 'agencies';
    protected $primaryKey = 'agency_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['agency_name','agency_code'];
}