<?php

namespace BDO\Http\Controllers;

use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function create(){
		return view('candidates.create');
	}
}
