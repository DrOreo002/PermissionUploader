<?php

namespace App\Http\Controllers;
use App\PermissionData;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
	    if ($pData == null) {
	        return view('admins.view')->with('error', 'Cannot find the data!');
        }
	    $fileContent = Storage::get($pData->file_path);
		return view('admins.view')->with('pData', $pData)->with('fileContent', $fileContent);
	}

	public function index_list() {
	    $permissionData = PermissionData::all();
	    return view('admins.list')->with('permissionData', $permissionData);
    }
}
