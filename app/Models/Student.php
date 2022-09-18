<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'adm_no',
        'first_name',
        'surname',
        'email',
        'phone',
        'joining_year',
        'completion_year',
        'programme_id',
        'dept_id'
    ];
}
