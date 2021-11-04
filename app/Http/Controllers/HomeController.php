<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kolam;

use App\Exports\KolamExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
    	$tabel = Kolam::all();

    	$kolam = [];
    	$suhu = [];
    	$ph = [];

    	foreach ($tabel as $g) {
    		$kolam[] = $g->kolam;
    		$suhu[] = $g->suhu;
    		$ph[] = $g->ph;
    	}

    	//dd(json_encode($ph));

        return View('index', compact('tabel','kolam','suhu','ph') );
    }

    	public function export_excel()
	{
		return Excel::download(new KolamExport, 'Kolam.xlsx');
	}
}
