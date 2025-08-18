<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffSalary extends Model
{
    use HasFactory;
    protected $fillable = [
        'rec_id',
        'salary',
        'tax',
        'net_salary',
        'month',
        'days',
        'year',
        'leaves',
        'paiddays',
        'code',
        'net_amount'
    ];
}
