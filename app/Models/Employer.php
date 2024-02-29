<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
