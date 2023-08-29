<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class DomesticModel extends Model{
    
    protected $table = 'domestic';
    protected $primaryKey = 'domestic_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['operation_id','load_commodity','load_qty','load_type','unload_commodity','unload_qty','unload_type'];
}