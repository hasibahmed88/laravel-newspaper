<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newslatter extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
    ];
}
