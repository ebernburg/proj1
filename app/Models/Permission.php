<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends \Spatie\Permission\Models\Permission
{


//    protected $dates = [
//        'created_at',
//        'updated_at',
//        'deleted_at',
//    ];

    protected $fillable = [
        'name',

        'guard_name'
    ];

}
