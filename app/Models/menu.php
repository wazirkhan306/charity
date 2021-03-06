<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\menu_item;


class menu extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    // THIS function menu_item TO MAKE RELATHION WITH menu
    public function menu_items()
    {
        return $this->hasMany('App\Models\menu_item');
    }
}
