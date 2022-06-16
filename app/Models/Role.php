<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name'
    ];

    /**
     * A role can have many users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users() {

        return $this->hasMany('App\Models\User');
    }
}
