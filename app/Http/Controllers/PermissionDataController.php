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
	    $this->validate($request, ['select_file' => 'required|mimes:txt']); // Will also detect empty .txt file as a null or not a .txt file
		$file = $request->file('select_file');
		$path = $file->store('permission_data');

		$permissionData = new PermissionData();
		$permissionData->file_name = $file->getClientOriginalName();
		$permissionData->submitted_by = Auth::user()->name;
		$permissionData->file_path = $path;
		$permissionData->save();

		return redirect('/upload')->with('success', 'File uploaded!');
    }

    public function index_upload() {
     	return view('upload_permission');
    }

	public function index_view($id) {
	    $pData = PermissionData::find($id);
	    if (!$pData->exists) {
	        return view('admins.view')->with([
	            'message', 'Cannot find the data!'
            ]);
        }
		return view('admins.view')->with([
		    'pData' => $pData
        ]);
	}

	public function index_list() {
	    $permissionData = PermissionData::all();
	    return view('admins.list')->with('permissionData', $permissionData);
    }
}
