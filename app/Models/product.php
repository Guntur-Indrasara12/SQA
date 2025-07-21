<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasQueryFilters;

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

    protected $table = 'products';
    protected $fillable = ['name', 'description', 'price', 'quantity'];

    public function products()
    {
        return $this->hasMany(Order::class);
    }
}
