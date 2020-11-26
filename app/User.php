<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    // public $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // // MUTATOR - changes the behavior of the field
    // public function setPasswordAttribute($password){
    //     $this->attributes['password'] = bcrypt($password);
    // }

    // // ACCESSOR - changes the field without affecting the database
    // public function getNameAttribute($name){
    //     return ucfirst($name);
    // }    

    public static function uploadAvatar($image){
        $filename = $image->hashName();
        Self::deleteOldImage();
        $image->store('images', 'public');            
        auth()->user()->update(['avatar' => $filename]);
    }

    protected static function deleteOldImage(){
        if(auth()->user()->avatar){
            Storage::delete('/public/images/' . auth()->user()->avatar);
        }
    }

    public function todos(){
        return $this->hasMany(Todo::class);
    }
    
}
