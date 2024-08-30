<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class privacy extends Model
{
    use HasFactory;
    public $table = "privacy";
    public $primarykey = "id";
}
