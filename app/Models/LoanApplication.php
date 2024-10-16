<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    use HasFactory;
    // Specify which attributes should be mass assignable
    protected $fillable = [
        'name',
        'email',
        'tel',
        'occupation',
        'monthly_salary',
        'paysheet',
    ];
}
