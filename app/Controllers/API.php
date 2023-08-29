<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ScheduleModel;
 
class API extends ResourceController
{
    use ResponseTrait;

    public function Schedule()
    {
        $schedules = new ScheduleModel();
        $data = $schedules->getSchedulesAPI();
        return $this->respond($data, 200);
    }
   
}