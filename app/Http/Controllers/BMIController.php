<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BMIController extends Controller
{
    public function index()
	{
		return 'Show form to collect data from user';
	}
	public function results($output = null)
	{
		return view('results')->with(['output' =>$output]);
		//redirect to results
	}
	public function show($results = null)
{
    return view('show');
}
}
