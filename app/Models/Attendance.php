<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;


class attendance extends Model
{
    use HasFactory;
    public function Employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
