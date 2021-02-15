<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'news_title',
        'news_short_description',
        'news_long_description',
        'status',
        'news_image',
        'total_view',
        'total_comment',
        'featured',
        'trending',
        'tags'
    ];

}
