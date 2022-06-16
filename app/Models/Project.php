<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function staffs()
    {
        return $this->belongsToMany(Staff::class,'project_staff');
    }

    public function donors()
    {
        return $this->belongsToMany(Donor::class);
    }

}
