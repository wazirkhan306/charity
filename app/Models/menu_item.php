<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\menu;


class menu_item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_id', 'order', 'title','url','target'
    ];

    // THIS function menu TO MAKE RELATHION Post
     public function menu()
    {
        return $this->belongsTo('App\Models\menu','menu_id');
    }
}
