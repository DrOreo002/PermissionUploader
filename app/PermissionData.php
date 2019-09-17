<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionData extends Model
{
	protected $fillable = ['file_name', 'submitted_by', 'created_at', 'updated_at', 'verified'];

    protected $table = "permissions_data";
}
