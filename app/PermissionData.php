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
 * @property int $id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PermissionData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PermissionData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PermissionData query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PermissionData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PermissionData whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PermissionData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PermissionData whereSubmittedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PermissionData whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PermissionData whereVerified($value)
 */
class PermissionData extends Model
{

	protected $fillable = ['file_path', 'submitted_by', 'created_at', 'updated_at', 'verified'];

    protected $table = "permissions_data";
}
