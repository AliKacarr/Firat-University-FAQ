<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'sss';
    protected $fillable = ['question', 'answer', 'category'];
}
