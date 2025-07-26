<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;


class profile extends Model
{
    use LogsActivity;

    protected $table = 'profiles';
    protected $fillable = ['name', 'description', 'age', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnlyDirty()
            ->logOnly(['user_id', 'name', 'age', 'description'])
            ->useLogName('profile')
            ->dontSubmitEmptyLogs();
    }

}
