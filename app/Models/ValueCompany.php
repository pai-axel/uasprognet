<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValueCompany extends Model
{
    use HasFactory;

    protected $table = 'value_company';
    protected $fillable = ['value_title', 'value_color', 'value_content'];
}
