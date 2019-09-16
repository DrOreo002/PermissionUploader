<?php

namespace App\Http\Controllers;

use App\PermissionData;

class VerifyController extends Controller 
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
    	$data = PermissionData::all();
        return view('admins.verify')->with(['permissionData' => $data]);
    }
}
