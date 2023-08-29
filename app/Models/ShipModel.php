<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class ShipModel extends Model{
    protected $primaryKey = 'ship_id';
    protected $table = 'ship';
    protected $allowedFields = ['ship_name','ship_type','gross_ton','width','length'];
}