<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['country_code', 'number', 'person_id'];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
