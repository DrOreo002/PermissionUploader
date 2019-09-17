<?php

namespace App\Http\Controllers;

use App\PermissionData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UploadPermissionData;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class PermissionDataController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	} 

    public function submit(Request $request) {
		$validated = $request->validate(
            ['select_file' => 'required|mimes:txt']
        );

		$file = $request->file('select_file');
		$path = Storage::putFile('permission_data', $file, 'public');

		$permissionData = new PermissionData();
		$permissionData->file_name = $file->getClientOriginalName();
		$permissionData->submitted_by = Auth::user()->name;
		$permissionData->save();

		return redirect('/upload')->with('success', 'File uploaded!');
    }

    public function index_upload() {
     	return view('upload_permission');
    }

	public function index_view() {
		return view('admins.view');
	}
}
