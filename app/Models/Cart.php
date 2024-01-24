<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
    ];

    public function Products() {
        return $this->belongsTo(Product::class);
    }

    public function Users() {
        return $this->belongsTo(User::class);
    }
}
