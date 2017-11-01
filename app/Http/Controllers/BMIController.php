<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BMIController extends Controller
{
    public function index()
	{
		return 'Show form to collect data from user';
	}
	public function results(Request $request)
	{
        $this->validate($request, [
            'measure' => 'required|string',
            'gender' => 'required|string',
            'age' => 'required|numeric|min:16|max:130',
            'weight' => 'required|numeric|min:50|max:350',
            'height' => 'numeric|min:55|max:84',
            'activity' => 'required|min:3',
        ]);
		return view('results')->with(['output' =>$request]);
		//redirect to results
	}
	public function show($results = null)
{
    return view('show');
}
}
