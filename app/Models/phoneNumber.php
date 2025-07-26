<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasQueryFilters;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property float $price
 * @property int $quantity
 */
class phoneNumber extends Model
{
    use HasQueryFilters;
    use LogsActivity;

    protected $table = 'phone_numbers';
    protected $fillable = ['phone', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnlyDirty()
            ->logOnly(['user_id', 'phone'])
            ->useLogName('phoneNumber')
            ->dontSubmitEmptyLogs();
    }
}
