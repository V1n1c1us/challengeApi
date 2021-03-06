<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    protected $fillable = ['id','name','description','temperament','life_span','origin'];
    public $timestamps = false;
}
