<?php

namespace App\Http\Controllers;

use App\PermissionData;
use League\Flysystem\FileNotFoundException;

class UniversalApiController extends Controller
{
    /**
     * Get the list of PermissionData, will only get the
     * verified one
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function api_list() {
        $pData = PermissionData::where('verified', 1)->get();
        return \Response::json($pData);
    }

    /**
     * Download the PermissionData file
     *
     * @param $id The PermissionData id
     * @return string|\Symfony\Component\HttpFoundation\BinaryFileResponse
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function api_download($id) {
        $pData = PermissionData::find($id);
        if ($pData == null) return \Response::json(["error" => "Cannot find file with the id of $id"]);
        return \Storage::download($pData->file_path);
    }
}
