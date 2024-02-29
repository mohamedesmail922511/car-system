<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;
    protected $dates = ['created_at', 'updated_at', 'task_time'];
    public function employer(){
        return $this->belongsTo(Employer::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
