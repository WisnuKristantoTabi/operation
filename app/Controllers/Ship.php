<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ShipModel;
// use App\Models\PortModel;
// use App\Models\ScheduleModel;
// use App\Models\RouteModel;
use Illuminate\Http\Request;
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



class Ship extends Controller
{

    public function index()
	{
		$ships = new ShipModel();

        $data = [
			'title_meta'	 => view('partials/title-meta', ['title' => 'Dashboard']),
			'page_title' 	=> view('partials/page-title', ['title' => 'Dashboard', 'li_1' => 'Minia', 'li_2' => 'Dashboard']),
			'ships' => $ships->findAll()
		];
		// echo $schedules->getSchedules();
		// print_r($schedules);
		return view('apps/ship/index', $data);
	}

	public function add()
	{
		
        $data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Dashboard']),
			'page_title' => view('partials/page-title', ['title' => 'Dashboard', 'li_1' => 'Minia', 'li_2' => 'Dashboard']),
			
		];
		
		return view('apps/ship/add', $data);
	}

	public function save(){

		$ships = new ShipModel();

		$this->request->getPost('nameship') . "</br>";
		$this->request->getPost('gt'). "</br>";
		$this->request->getPost('length'). "</br>";

		$ships->insert([
			'ship_name' 	=> $this->request->getPost('shipname'),
			'ship_type' 	=> $this->request->getPost('shiptype'),
			'gross_ton' 	=> $this->request->getPost('grosston'),
			'length' 		=> $this->request->getPost('length'),
			'width' 		=> $this->request->getPost('width'),
		]);
		
		return redirect()->to(base_url('ship'));

	}
	// public function save(){
	// 	$schedule 	= new ScheduleModel();

	// 	$schedule->insert([
	// 		'ship_id' 			=> $this->request->getPost('shipid'),
	// 		'arrived_date' 		=> $this->request->getPost('datearrive'),
	// 		'arrived_time' 		=> $this->request->getPost('timearrive'),
	// 		'departure_date' 	=> $this->request->getPost('datedepture'),
	// 		'departure_time'	=> $this->request->getPost('timedepture'),
	// 		'route_id'			=> $this->request->getPost('route'),
	// 		'status' 			=> $this->request->getPost('status')
	// 	]);

	// 	return redirect()->to(base_url('schedule'));
	// }

	public function edit($id){
		$ships = new ShipModel();

		$data = [
			'title_meta' 	=> view('partials/title-meta', ['title' => 'Dashboard']),
			'page_title' 	=> view('partials/page-title', ['title' => 'Dashboard', 'li_1' => 'Minia', 'li_2' => 'Dashboard']),
			'ships' 		=> $ships->where('ship_id', $id)->first()
		];

		return view('apps/ship/edit', $data);
	}

	// public function update($id){
	// 	$schedule = new ScheduleModel();

	// 	$schedule->update($id, [
	// 		'ship_id' 			=> $this->request->getPost('shipid'),
	// 		'arrived_date' 		=> $this->request->getPost('datearrive'),
	// 		'arrived_time' 		=> $this->request->getPost('timearrive'),
	// 		'departure_date' 	=> $this->request->getPost('datedepture'),
	// 		'departure_time'	=> $this->request->getPost('timedepture'),
	// 		'status' 			=> $this->request->getPost('status')
	// 	]);

	// 	return redirect()->to(base_url('schedule'));
	// }

	public function delete($id){
		$ships = new ShipModel();

		$ships->delete($id);
		return redirect()->to(base_url('ship'));
	}

	// public function exportExcel(){

	// 	$scheduleModel = new ScheduleModel();
	// 	$spreadsheet = new Spreadsheet();

	// 	$schedules = $scheduleModel->findAll();

	// 	$spreadsheet->setActiveSheetIndex(0)
    //         ->setCellValue('A1', 'ID')
    //         ->setCellValue('B1', 'Tgl datang')
    //         ->setCellValue('C1', 'Tgl Pergi');

	// 		$column = 2;

	// 		foreach ($schedules as $schedule) {
	// 			$spreadsheet->setActiveSheetIndex(0)
	// 				->setCellValue('A' . $column, $schedule['ship_id'])
	// 				->setCellValue('B' . $column, $schedule['arrived_date'])
	// 				->setCellValue('C' . $column, $schedule['departure_date']);
	
	// 			$column++;
	// 		}
	
	// 		$writer = new Xlsx($spreadsheet);
	// 		$filename = date('Y-m-d-His'). '-Data-Excel';
	
	// 		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	// 		header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
	// 		header('Cache-Control: max-age=0');
	
	// 		$writer->save('php://output');
	// }

	

}