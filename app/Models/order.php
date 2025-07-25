<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;


class Order extends Model
{
    use LogsActivity;

    protected $table = 'orders';
    protected $fillable = ['product_id', 'quantity', 'total'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnlyDirty()
            ->logOnly(['product_id', 'quantity', 'total'])
            ->useLogName('order')
            ->dontSubmitEmptyLogs();
    }
}
