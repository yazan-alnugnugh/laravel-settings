<?php

namespace Yazan\Setting\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yazan\Setting\Traits\HasSetting;

class User extends Model
{
    use HasFactory;
    use HasSetting;
    protected $guarded = [];


}
