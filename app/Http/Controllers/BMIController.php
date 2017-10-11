<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BMIController extends Controller
{
    public function index()
	{
		return 'Show form to collect data from user';
	}
	public function checkform()
	{
		return 'Process form';
		//redirect to results
	}
}
