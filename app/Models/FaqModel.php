<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqModel extends Model
{
    protected $table = 'sss';
    protected $fillable = ['question', 'answer', 'category'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = env('MYSQL_TABLE', 'sss');
    }
}
