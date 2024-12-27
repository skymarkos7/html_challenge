<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'email', 'avatar'];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}