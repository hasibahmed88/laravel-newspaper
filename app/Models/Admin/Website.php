<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;
    protected $fillable = [
        'web_header_logo',
        'web_footer_logo',
        'web_title',
        'web_description',
        'web_footer_text',
    ];
}
