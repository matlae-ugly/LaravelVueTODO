<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class todos extends Model
{
    protected $fillable = [
        'completed', 'name', 'list_id'
    ];

    public function list(){
        return $this->belongsTo(lists::class);
    }
}
