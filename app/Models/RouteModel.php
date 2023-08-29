<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class RouteModel extends Model{
    protected $table = 'route';
    protected $primaryKey = 'route_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['route_name','route_desc'];
}