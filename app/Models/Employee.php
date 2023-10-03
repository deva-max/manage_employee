<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
        'gender',
        'dob',
        'employment_type'
    ];

    public function Qualifications()
    {
        return $this->belongsToMany(Qualification::class)
        ->withTimestamps()
        ->using(EmployeeQualification::class,'employee_qualification','employee_id','qualification_id');
    }
}
