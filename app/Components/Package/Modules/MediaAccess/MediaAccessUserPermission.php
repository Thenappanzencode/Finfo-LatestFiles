<?php
namespace App\Components\Package\Modules\MediaAccess;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MediaAccessUserPermission extends Model  {
    protected $table = 'media_access_permission';
    public $timestamps = false;
}