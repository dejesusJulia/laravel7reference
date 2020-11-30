<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Step;
use App\User;

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

    public function steps(){
        return $this->hasMany(Step::class);
    }
}
