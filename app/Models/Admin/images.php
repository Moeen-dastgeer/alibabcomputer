<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Admin\product;

class images extends Model
{
    use HasFactory;
    protected $fillable = [
        'images',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(product::class);
    }

}
