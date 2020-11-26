<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'title', 'completed', 'description','user_id'
    ];

    // public function getRouteKeyName()
    // {
    //     return 'title';
    // }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
