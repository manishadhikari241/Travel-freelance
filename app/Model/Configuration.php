<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $fillable=['configuration_key','configuration_value'];
}
