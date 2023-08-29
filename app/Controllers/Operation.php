<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ShipModel;
use App\Models\AgencyModel;
use App\Models\PortModel;
use App\Models\CruiseModel;
use App\Models\DomesticModel;
use App\Models\OperationModel;
use App\Helpers\ExcelHelper;


class Operation extends Controller
{
	// protected $produk;

	// function __construct()
	// {
	// 	$this->produk = new ProdukModel();
	// 	$this->rekomendasi = new RekomendasiModel();

	// }
	public function index(){
		$operations = new OperationModel();
		

		$data = [
			'title_meta'	=> view('partials/title-meta', ['title' => 'Dashboard']),
			'page_title' 	=> view('partials/page-title', ['title' => 'Dashboard', 'li_1' => 'Minia', 'li_2' => 'Dashboard']),
			'operations'		=> $operations->getOperasional(),
			'date' 			=> date('m'),
			'year' 			=> date('Y')
		];
		
		// print_r($operations->getOperasional());
		// return $this->response->setJSON($operations->getOperasional());
		return view('apps/operations/index', $data);

	}

    public function add()
	{
        
        $ships      = new ShipModel();
        $agencies   = new AgencyModel();
        $ports      = new PortModel();
		$cruises	= new CruiseModel(); 

        $data = [
			'title_meta' 	=> view('partials/title-meta', ['title' => 'Dashboard']),
			'page_title' 	=> view('partials/page-title', ['title' => 'Dashboard', 'li_1' => 'Minia', 'li_2' => 'Dashboard']),
            'ships' 		=> $ships->findAll(),
            'agencies' 		=> $agencies->findAll(),
            'ports' 		=> $ports->findAll(),
			'cruises' 		=> $cruises->findAll()
		];
		
		return view('apps/operations/add', $data);
	}

	public function save(){
		$operations = new OperationModel();
		$domestics 	= new DomesticModel();

		$operations->insert([
			'ship_id' 			=> $this->request->getPost('shipid'),
			'cruise_id'			=> $this->request->getPost('cruiseid'),
			'id_agency' 		=> $this->request->getPost('agencyid'),
			'arrived_date' 		=> $this->request->getPost('datearrive'),
			'arrived_time' 		=> $this->request->getPost('timearrive'),
			'origin'			=> $this->request->getPost('origin'),
			'departure_date' 	=> $this->request->getPost('datedepture'),
			'departure_time'	=> $this->request->getPost('timedepture'),
			'destination'		=> $this->request->getPost('destination'),
			'p_get_on'			=> $this->request->getPost('pon'),
			'p_get_off'			=> $this->request->getPost('poff'),
			'status' 			=> $this->request->getPost('status')
		]);

		// echo "test";
		// echo $this->request->getPost('agencyid');
		// print_r($this->request->getVar());
		$loadcommodity 	= $this->request->getPost('domesticloadcommodity');
		$loadqty 		= $this->request->getPost('domesticloadqty');
		$loadtype 		= $this->request->getPost('domesticloadtype');

		if(!is_null($this->request->getPost('domesticloadcommodity[]'))){
			$loadcommodity 	= $this->request->getPost('domesticloadcommodity');
			$loadqty 		= $this->request->getPost('domesticloadqty');
			$loadtype 		= $this->request->getPost('domesticloadtype');
            foreach((array) $this->request->getPost('domesticloadcommodity[]') as $data=>$no){
                $domestics 	= new DomesticModel();
				
				$domestics->insert([
					'operation_id' 		=> $operations->getInsertID(),
					'load_commodity'	=> $loadcommodity[$data],
					'load_qty'			=> $loadqty[$data] ,
					'load_type'			=> $loadtype[$data] 
				]);

				
				
            }
        } 
		
		if(!is_null($this->request->getPost('domesticunloadcommodity[]'))){
			$unloadcommodity 	= $this->request->getPost('domesticunloadcommodity');
			$unloadqty 		= $this->request->getPost('domesticunloadqty');
			$unloadtype 		= $this->request->getPost('domesticunloadtype');
            foreach((array) $this->request->getPost('domesticunloadcommodity[]') as $data=>$no){
                $domestics 	= new DomesticModel();
				
				$domestics->insert([
					'operation_id' 		=> $operations->getInsertID(),
					'unload_commodity'	=> $unloadcommodity[$data],
					'unload_qty'			=> $unloadqty[$data] ,
					'unload_type'			=> $unloadtype[$data] 
				]);

				
			
            }
        } 
		return redirect()->to(base_url('operation'));
	}

	public function import()
	{
		$helper = new ExcelHelper();

		$excelFile = $this->request->getFile('excel_file');
		// Move the file to a desired location
		// $excelFilePath = WRITEPATH . 'uploads/' . $excelFile->getRandomName();
		// $excelFile->move(WRITEPATH . 'uploads');

		// Call the helper function to import the data
		// importExcelToDatabase($excelFilePath);
		foreach($helper->importExcelToDatabase($excelFile) as $x => $row) {
			if ($x == 0) {
				continue;
			}
			print_r($row);
		}
	}

	public function showByDate($date,$year){
		$operations = new OperationModel();
		

		$data = [
			'title_meta'	=> view('partials/title-meta', ['title' => 'Dashboard']),
			'page_title' 	=> view('partials/page-title', ['title' => 'Dashboard', 'li_1' => 'Minia', 'li_2' => 'Dashboard']),
			'operations'	=> $operations->getByDate($date,$year),
			'date' 			=> $date,
			'year' 			=> $year
		];
		// print_r($data);
		return view('apps/operations/index', $data);

	}

	public function download($date,$year)
	{
		$operations = new OperationModel();
		$helper = new ExcelHelper();
		$data = $operations->downloadOperation($date,$year);
		$helper->downloadExcelToDatabase($data);

	}


	public function find()
	{
		$m = $this->request->getPost('month');
		$y = $this->request->getPost('year');
		return redirect()->to("/operation-show/".strval($m)."/".strval($y));
		
	}

	

}