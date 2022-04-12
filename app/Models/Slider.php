<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'sliders';

    protected $fillable = ['title', 'slug', 'image', 'caption', 'captioncolor', 'button_text', 'buttoncolor', 'button_url', 'meta_name', 'meta_keyword', 'meta_description', 'sort_order', 'status'];
}
