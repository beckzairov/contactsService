<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
    	'name',
    	'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contact(){
    	return $this->hasMany(Phone::class);
    }

    public function followers(){
        return $this->belongsToMany(User::class);
    }
}
