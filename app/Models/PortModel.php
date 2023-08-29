<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class PortModel extends Model{
    protected $table = 'ports';
    protected $primaryKey = 'port_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['port_name'];
}