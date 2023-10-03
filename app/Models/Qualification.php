<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;
    
    public $fillable = [
        'title',
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class)
        ->withTimeStamps()
        ->using(EmployeeQualification::class,'employee_qualification','qualification_id','employee_id');
    }
}
