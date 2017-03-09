<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DateTime;

class EndUserController extends Controller {		
	public function __construct() {
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
	}
	
    // View tool 1
	public function viewMethodOne() {
		return view("tool/tool-1");
	}
	
	// View tool 2
	public function viewMethodTwo() {
		return view("tool/tool-2");
	}
	
	// View FAQ
	public function viewFaq() {
		return view("faq");
	}
	
	// View Track
	public function viewTrackCalendar() {
		return view("track/track-calendar");
	}
	
	public function viewTrackStatistic() {
		return view("track/track-statistic");
	}
}
