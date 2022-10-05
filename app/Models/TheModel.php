<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','model_img','model_3d_img','user_id','description','created_at','created_by'
    ];
}
