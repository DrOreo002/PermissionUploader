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

    public function destroy($id) {
        $data = PermissionData::find($id);
        $data->delete();

        $resultData = PermissionData::all();
        return redirect()->back()->with(['permissionData' => $resultData]);
	}
}
