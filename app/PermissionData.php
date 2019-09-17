<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

/**
 * Post
 *
 * @mixin Eloquent
 * @property string $file_path
 * @property string $file_name
 * @property string $submitted_by
 * @property string $created_at
 * @property string $updated_at
 * @property bool $verified
 */
class PermissionData extends Model
{

	protected $fillable = ['file_path', 'submitted_by', 'created_at', 'updated_at', 'verified'];

    protected $table = "permissions_data";
}
