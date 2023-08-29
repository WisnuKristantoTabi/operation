<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class OperationModel extends Model{
    protected $table = 'operation';
    protected $primaryKey = 'id_operation';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['cruise_id','id_agency','ship_id','arrived_date','arrived_time','origin','departure_date','departure_time','destination','p_get_on','p_get_off','status'];

    public function getOperasional()
    {
        $sql = "
        SELECT
  cruises.cruise_type,
  ship.ship_name,
  agencies.agency_code,
  arrived_date,
  arrived_time,
  ports_origin.port_name AS asal,
  departure_date,
  departure_time,
  ports_destination.port_name AS tujuan,
  GROUP_CONCAT(domestic.load_commodity SEPARATOR '</br>') AS load_commodity,
  GROUP_CONCAT(domestic.load_qty SEPARATOR '</br>') AS load_qty,
  GROUP_CONCAT(domestic.load_type SEPARATOR '</br>') AS load_type,
  GROUP_CONCAT(domestic.unload_commodity SEPARATOR '</br>') AS unload_commodity,
  GROUP_CONCAT(domestic.unload_qty SEPARATOR '</br>') AS unload_qty,
  GROUP_CONCAT(domestic.unload_type SEPARATOR '</br>') AS unload_type,
  p_get_on,
  p_get_off,
  status
FROM
  operation
  JOIN ship ON ship.ship_id = operation.ship_id
  JOIN cruises ON cruises.cruise_id = operation.cruise_id
  JOIN agencies ON operation.id_agency = agencies.agency_id
  JOIN ports AS ports_origin ON ports_origin.port_id = operation.origin
  JOIN ports AS ports_destination ON ports_destination.port_id = operation.destination
  LEFT JOIN domestic ON domestic.operation_id = operation.id_operation
WHERE
  MONTH(arrived_date) = MONTH(CURRENT_DATE()) AND YEAR(arrived_date) = YEAR(CURRENT_DATE()) OR
  MONTH(departure_date) = MONTH(CURRENT_DATE()) AND YEAR(departure_date) = YEAR(CURRENT_DATE())
GROUP BY
  cruises.cruise_type,
  ship.ship_name,
  agencies.agency_code,
  arrived_date,
  arrived_time,
  ports_origin.port_name,
  departure_date,
  departure_time,
  ports_destination.port_name,
  p_get_on,
  p_get_off,
  status
ORDER BY
  arrived_date ASC;
      ";
        
        return $this->db->query($sql)->getResultArray();
    }


    public function getByDate($date, $year)
    {
        $sql = "
        SELECT
  cruises.cruise_type,
  ship.ship_name,
  agencies.agency_code,
  arrived_date,
  arrived_time,
  ports_origin.port_name AS asal,
  departure_date,
  departure_time,
  ports_destination.port_name AS tujuan,
  GROUP_CONCAT(domestic.load_commodity SEPARATOR '</br>') AS load_commodity,
  GROUP_CONCAT(domestic.load_qty SEPARATOR '</br>') AS load_qty,
  GROUP_CONCAT(domestic.load_type SEPARATOR '</br>') AS load_type,
  GROUP_CONCAT(domestic.unload_commodity SEPARATOR '</br>') AS unload_commodity,
  GROUP_CONCAT(domestic.unload_qty SEPARATOR '</br>') AS unload_qty,
  GROUP_CONCAT(domestic.unload_type SEPARATOR '</br>') AS unload_type,
  p_get_on,
  p_get_off,
  status
FROM
  operation
  JOIN ship ON ship.ship_id = operation.ship_id
  JOIN cruises ON cruises.cruise_id = operation.cruise_id
  JOIN agencies ON operation.id_agency = agencies.agency_id
  JOIN ports AS ports_origin ON ports_origin.port_id = operation.origin
  JOIN ports AS ports_destination ON ports_destination.port_id = operation.destination
  LEFT JOIN domestic ON domestic.operation_id = operation.id_operation
WHERE
  (EXTRACT(MONTH FROM arrived_date) = $date AND EXTRACT(YEAR FROM arrived_date) = $year)
GROUP BY
  cruises.cruise_type,
  ship.ship_name,
  agencies.agency_code,
  arrived_date,
  arrived_time,
  ports_origin.port_name,
  departure_date,
  departure_time,
  ports_destination.port_name,
  p_get_on,
  p_get_off,
  status
ORDER BY
  arrived_date ASC;
      ";
        // return $year;
        return $this->db->query($sql)->getResultArray();
    }

    public function downloadOperation($date, $year)
    {
        $sql = "
        SELECT cruises.cruise_type,
  ship.ship_name,
  agencies.agency_code,
  arrived_date,
  arrived_time,
  ports_origin.port_name AS asal,
  departure_date,
  departure_time,
  ports_destination.port_name AS tujuan,
  GROUP_CONCAT(domestic.load_commodity SEPARATOR ',') AS load_commodity,
  GROUP_CONCAT(domestic.load_qty SEPARATOR ',') AS load_qty,
  GROUP_CONCAT(domestic.load_type SEPARATOR ',') AS load_type,
  GROUP_CONCAT(domestic.unload_commodity SEPARATOR ',') AS unload_commodity,
  GROUP_CONCAT(domestic.unload_qty SEPARATOR ',') AS unload_qty,
  GROUP_CONCAT(domestic.unload_type SEPARATOR ',') AS unload_type,
  p_get_on,
  p_get_off,
  status
FROM
  operation
  JOIN ship ON ship.ship_id = operation.ship_id
  JOIN cruises ON cruises.cruise_id = operation.cruise_id
  JOIN agencies ON operation.id_agency = agencies.agency_id
  JOIN ports AS ports_origin ON ports_origin.port_id = operation.origin
  JOIN ports AS ports_destination ON ports_destination.port_id = operation.destination
  LEFT JOIN domestic ON domestic.operation_id = operation.id_operation
WHERE
  (EXTRACT(MONTH FROM arrived_date) = $date AND EXTRACT(YEAR FROM arrived_date) = $year)
GROUP BY
  cruises.cruise_type,
  ship.ship_name,
  agencies.agency_code,
  arrived_date,
  arrived_time,
  ports_origin.port_name,
  departure_date,
  departure_time,
  ports_destination.port_name,
  p_get_on,
  p_get_off,
  status
ORDER BY
  arrived_date ASC;
      ";
        // return $year;
        return $this->db->query($sql)->getResultArray();
    }

}