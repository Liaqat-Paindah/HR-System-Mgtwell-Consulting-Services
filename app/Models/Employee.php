<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attendance;
use App\Models\User;
use App\Models\LeavesAdmin;



class Employee extends Model
{
    use HasFactory;
  
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function Leaves()
    {
        return $this->hasMany(LeavesAdmin::class);
    }
}
