<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class ScheduleModel extends Model{
    protected $table = 'schedule';
    protected $primaryKey = 'schedule_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['ship_id','arrived_date','arrived_time','origin','departure_date','departure_time','destination','route_id','status'];

    public function getSchedules()
    {
        // $sql = " SELECT * FROM schedule JOIN ship ON ship.ship_id = 
        // schedule.ship_id WHERE (departure_date ='".date('Y-m-d')."' AND departure_time > '".
        // date('H:i:s')."' ) OR (departure_date = DATE(departure_date) AND departure_time <
        // TIME(departure_time)) OR (departure_date >='".date('Y-m-d')."' AND departure_date < DATE(departure_date))
        // ORDER BY arrived_date ASC";

        $sql = " SELECT * FROM schedule JOIN ship ON ship.ship_id = schedule.ship_id 
        WHERE (departure_date >'".date('Y-m-d')."' AND departure_time > '00:00:00') OR 
        (departure_date = '".date('Y-m-d')."' AND departure_time > '".date('H:i:s')."') OR 
        (arrived_date >'".date('Y-m-d')."' AND arrived_time > '00:00:00') OR 
        (arrived_date = '".date('Y-m-d')."' AND arrived_time > '".date('H:i:s')."') 
        ORDER BY arrived_date ASC";
        
        return $this->db->query($sql)->getResultArray();
    }

    public function getSchedulesAPI()
    {
       

        // $sql = " SELECT ship_name AS 'Nama Kapal',arrived_date AS 'Tanggal Tiba',arrived_time AS 'Jam Tiba',
        // (SELECT ports.port_name FROM ports WHERE schedule.destination = ports.port_id) as Tujuan,
        // departure_date AS 'Tanggal Berangkat',departure_time AS 'Jam Berangkat', 
        // (SELECT ports.port_name FROM ports WHERE schedule.origin = ports.port_id) as Asal,
        // route_desc AS 'Rute', status FROM schedule JOIN ship ON ship.ship_id = 
        // schedule.ship_id JOIN route on route.route_id = schedule.route_id JOIN ports on schedule.origin =  ports.port_id 
        // WHERE (departure_date >'".date('Y-m-d')."' AND departure_time > '00:00:00') OR 
        // (departure_date = '".date('Y-m-d')."' AND departure_time > '".date('H:i:s')."')
        // ORDER BY arrived_date ASC";

        $sql = " SELECT ship_name AS 'Nama Kapal',arrived_date AS 'Tanggal Tiba',arrived_time AS 'Jam Tiba',
        departure_date AS 'Tanggal Berangkat',departure_time AS 'Jam Berangkat', route_desc AS 'Rute'
        FROM schedule JOIN ship ON ship.ship_id = schedule.ship_id LEFT JOIN route on route.route_id = schedule.route_id
        WHERE (departure_date >'".date('Y-m-d')."' AND departure_time > '00:00:00') OR 
        (departure_date = '".date('Y-m-d')."' AND departure_time > '".date('H:i:s')."') OR 
        (arrived_date >'".date('Y-m-d')."' AND arrived_time > '00:00:00') OR 
        (arrived_date = '".date('Y-m-d')."' AND arrived_time > '".date('H:i:s')."') 
        ORDER BY arrived_date ASC";
        
        return $this->db->query($sql)->getResultArray();
    }
}