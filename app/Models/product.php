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
class Product extends Model
{
    use HasQueryFilters;
    use LogsActivity;

    protected $table = 'products';
    protected $fillable = ['name', 'description', 'price', 'quantity'];

    public function products()
    {
        return $this->hasMany(Order::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnlyDirty()
            ->logOnly(['name', 'quantity', 'price'])
            ->useLogName('Product')
            ->dontSubmitEmptyLogs();
    }
}
