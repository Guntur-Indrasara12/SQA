<?php

namespace App\Models;

use App\Traits\HasQueryFilters;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasQueryFilters;
    protected $table = 'activity_log';
    protected $fillable = ['log_name', 'description', 'properties', 'created_at'];

}
