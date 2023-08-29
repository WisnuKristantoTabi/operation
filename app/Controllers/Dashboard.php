<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DashboardModel;

class Dashboard extends Controller
{
	// protected $produk;

	// function __construct()
	// {
	// 	$this->produk = new ProdukModel();
	// 	$this->rekomendasi = new RekomendasiModel();

	// }

    public function index()
	{
		$dashboard = new DashboardModel();
        $data = [
			'title_meta' 	=> view('partials/title-meta', ['title' => 'Dashboard']),
			'page_title' 	=> view('partials/page-title', ['title' => 'Dashboard', 'li_1' => 'Minia', 'li_2' => 'Dashboard']),
			'passenger' 	=> $dashboard->getPon(),
			'track' 		=> $dashboard->getTrack(),
			'load' 			=> $dashboard->getLoadCommodity(),
			'unload'		=> $dashboard->getUnloadCommodity()
		];
		return view('index', $data);
	}

	

}