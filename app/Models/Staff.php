<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Staff extends Authenticatable
{
    use HasFactory,Notifiable;
    protected $guard = 'staff';

    public function projects()
    {
        return $this->belongsToMany(Project::class,'project_staff');
    }

}
