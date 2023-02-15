<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_ID';

    protected $fillable = [
        'generic_name', 'brand_name', 'product_form', 'market_price', 'image_path'
    ];

    public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false) {
            $query->where('generic_name', 'like', '%' . $filters['search'] . '%')
            ->orWhere('brand_name', 'like', '%' . $filters['search'] . '%');
        }
    }
}
