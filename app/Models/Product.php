<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $with = ['setProducts'];
    
    protected $fillable = [
        'name',
        'type',
        'price',
    ];
    
    public function setProducts() {
        return $this->hasManyThrough(self::class, SetProduct::class, 'set_id', 'id', 'id', 'product_id');
    }
}
