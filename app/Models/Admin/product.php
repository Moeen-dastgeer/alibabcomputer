<?php

namespace App\Models;
namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Admin\images;
class product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'price',
        'discount_price',
        'short_desc',
        'long_desc',
        'image',
        'keyword',
        'status',
        'qty',
        'cat_id',
        'manufac_id',
        'vendor_id',
        'featured',
    ];
    public function images()
    {
    
        return $this->hasMany(images::class);

    }
    
    
}

