<?php namespace App\Models;
 
use CodeIgniter\Model;

class DashboardModel extends Model {
    public function getPon()
    {
        $sql = "
        SELECT
            MONTHNAME(c.month_date) AS month,
            COALESCE(SUM(p.p_get_on), 0) AS penumpang_naik,
            COALESCE(SUM(p.p_get_off), 0) AS penumpang_turun
        FROM
            calendar c
        LEFT JOIN
            operation p ON EXTRACT(MONTH FROM p.arrived_date) = EXTRACT(MONTH FROM c.month_date)
        WHERE
            YEAR(c.month_date) = YEAR(CURRENT_DATE()) AND YEAR(p.arrived_date) = YEAR(CURRENT_DATE())
        GROUP BY
            EXTRACT(MONTH FROM c.month_date)
        ORDER BY
            EXTRACT(MONTH FROM c.month_date);
        ";  
        return $this->db->query($sql)->getResultArray();
    }

    public function getTrack()
    {
        $sql = "
        SELECT
            MONTHNAME(c.month_date) AS month,
            COALESCE(COUNT(p.ship_id), 0) AS kunjungan_kapal
        FROM
            calendar c
        LEFT JOIN
            operation p ON MONTH(p.arrived_date) = MONTH(c.month_date) AND YEAR(p.arrived_date) = YEAR(CURRENT_DATE())
        WHERE
            YEAR(c.month_date) = YEAR(CURRENT_DATE()) AND YEAR(p.arrived_date) = YEAR(CURRENT_DATE())
        GROUP BY
            EXTRACT(MONTH FROM c.month_date)
        ORDER BY
            EXTRACT(MONTH FROM c.month_date);

        ";  
        return $this->db->query($sql)->getResultArray();
    }


    public function getLoadCommodity()
    {
        $sql = "
        SELECT DISTINCT
    d.load_commodity,
    o.muat_sum AS muat,
    d.load_type
FROM
    domestic d
LEFT JOIN (
    SELECT
        d.load_commodity,
        SUM(d.load_qty) AS muat_sum
    FROM
        domestic d
    LEFT JOIN
        operation p ON p.id_operation = d.operation_id 
    WHERE
        YEAR(p.arrived_date) = YEAR(CURRENT_DATE()) AND
        d.load_commodity IS NOT NULL 
    GROUP BY
        d.load_commodity
) o ON o.load_commodity = d.load_commodity
WHERE
    d.load_commodity IS NOT NULL
ORDER BY
    d.load_commodity;
        ";  
        return $this->db->query($sql)->getResultArray();
    }

    public function getUnloadCommodity()
    {
        $sql = "
        SELECT DISTINCT
    d.unload_commodity,
    o.muat_sum AS bongkar,
    d.unload_type
FROM
    domestic d
LEFT JOIN (
    SELECT
        d.unload_commodity,
        SUM(d.unload_qty) AS muat_sum
    FROM
        domestic d
    LEFT JOIN
        operation p ON p.id_operation = d.operation_id 
    WHERE
        YEAR(p.arrived_date) = YEAR(CURRENT_DATE()) AND
        d.unload_commodity IS NOT NULL 
    GROUP BY
        d.unload_commodity
) o ON o.unload_commodity = d.unload_commodity
WHERE
    d.unload_commodity IS NOT NULL
ORDER BY
    d.unload_commodity;
        ";  
        return $this->db->query($sql)->getResultArray();
    }


//     SELECT DISTINCT
//     d.load_commodity,
//     o.muat_sum AS muat,
//     d.load_type
// FROM
//     domestic d
// LEFT JOIN (
//     SELECT
//         d.load_commodity,
//         SUM(d.load_qty) AS muat_sum
//     FROM
//         domestic d
//     LEFT JOIN
//         operation p ON p.id_operation = d.operation_id AND YEAR(p.arrived_date) = YEAR(CURRENT_DATE())
//     GROUP BY
//         d.load_commodity
// ) o ON o.load_commodity = d.load_commodity
// WHERE
//     d.load_commodity IS NOT NULL
// ORDER BY
//     d.load_commodity; 

    // SELECT
    //         EXTRACT(MONTH FROM arrived_date) AS month,
    //         SUM(p_get_on) AS accumulated_passengers
    //     FROM
    //         operation
    //     GROUP BY
    //         EXTRACT(MONTH FROM arrived_date)
    //     ORDER BY
    //         EXTRACT(MONTH FROM arrived_date);


    // SELECT
    //         EXTRACT(MONTH FROM c.month_date) AS month,
    //         COALESCE(SUM(p.p_get_on), 0) AS accumulated_passengers
    //     FROM
    //         calendar c
    //     LEFT JOIN
    //         operation p ON EXTRACT(MONTH FROM p.arrived_date) = EXTRACT(MONTH FROM c.month_date)
    //     GROUP BY
    //         EXTRACT(MONTH FROM c.month_date)
    //     ORDER BY
    //         EXTRACT(MONTH FROM c.month_date);


//    
}