<?php

namespace App\Http\Controllers;

use App\PermissionData;
use Illuminate\Support\Facades\Storage;

class VerifyController extends Controller 
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
    	$data = PermissionData::all();
        return view('admins.verify')->with(['permissionData' => $data]);
    }

	/**
	 * Destroy the data. Should be working
	 * just fine
	 *
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception If something goes wrong
	 */
    public function destroy($id) {
        $data = PermissionData::find($id);
        $data->delete();
        Storage::delete($data->file_path);

        $resultData = PermissionData::all();
        return redirect()->back()->with(['permissionData' => $resultData]);
	}

    /**
     * Verify the data
     *
     * @param $id The data id
     * @return \Illuminate\Http\RedirectResponse a response?
     */
	public function verify($id) {
        $data = PermissionData::find($id);
        $data->verified = true;
        $data->save();

        $resultData = PermissionData::all();
        return redirect()->back()->with([
            'permissionData' => $resultData,
            'message' => 'Data verified successfully!'
        ]);
    }
}
