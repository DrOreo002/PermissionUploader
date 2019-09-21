<?php

namespace App\Http\Controllers;

use App\PermissionData;
use Illuminate\Http\Request;

class UniversalApiController extends Controller
{
    //
    public function api_list() {
        $pData = PermissionData::all()->toArray();
        return \Response::json($pData);
    }
}
