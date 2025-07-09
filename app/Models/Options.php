<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    use HasFactory;

    protected $table = 'options';
    protected $fillable = ['company_name', 'theme_color','banner_image', 'location', 'call', 'email', 'maps', 'product_footer','slug'];
}
