<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lists extends Model
{
    protected $fillable = [
        'name'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function todos(){
        return $this->hasMany(todos::class, 'list_id');
    }
}
