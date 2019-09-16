<?php

namespace App\Http\Controllers;

use App\PermissionData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionDataController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

    public function submit(Request $request) {
		$this->validate($request, [
			'select_file' => 'required'
		]);

		$file = $request->file('select_file');
		$permissionData = new PermissionData();
		$permissionData->file_name = $file->getClientOriginalName();
		$permissionData->submitted_by = Auth::user()->name;
		$permissionData->save();

		return redirect('/upload')->with('message', 'File uploaded!');
    }

    public function index_upload() {
     	return view('upload_permission');
    }

    public function index_verify() {

	}
}
