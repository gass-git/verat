<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'body',
        'image',
        'views',
        'category'
    ];

    protected $table = 'posts';
    
    public function category(){

        return $this->hasMany( 'App\Category' , 'post_id' );

    }

    public function interaction(){

        return $this->hasMany('App\Interaction' , 'post_id');

    }

}
