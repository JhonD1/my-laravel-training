<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Task extends Model
{
    //
    // public $table = 'localourshop';

    protected $fillable = [
        'name',
        'title',
        'description',
        'photo',
        'created_by'
    ];

    public function users(){

        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    public function roles(){

        return $this->belongsToMany('App\Role');
    }

    // public function users()
    // {
    //     return $this->belongsToMany(User::class);
    // }
}
