<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $table = 'faqs';

    public $timestamps = true;

    protected $fillable = ['question', 'answer'];

    protected $attributes = [ 
        'answer' => 'default text',
    ];
}
