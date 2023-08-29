<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class CruiseModel extends Model{
    protected $table = 'cruises';
    protected $primaryKey = 'cruise_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['cruise_type'];
}