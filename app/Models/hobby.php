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
class Hobby extends Model
{
    use HasQueryFilters;
    use LogsActivity;

    protected $table = 'Hobbies';
    protected $fillable = ['name'];

    public function Hobbys()
    {
        return $this->hasMany(Order::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnlyDirty()
            ->logOnly(['name'])
            ->useLogName('Hobby')
            ->dontSubmitEmptyLogs();
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
