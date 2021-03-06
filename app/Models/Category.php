<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\User;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id', 'order', 'title','slug','color'
    ];

    // THIS function Posts TO MAKE RELATHION WITH Category
    public function Posts()
    {
        return $this->hasMany('App\Post');
    }

    // THIS function User TO MAKE RELATHION WITH Category
    public function User()
    {
        return $this->hasMany('App\User');
    }
}
