<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MichaelAChrisco\ReadOnly\ReadOnlyTrait;

class PersonalDetails extends Model
{
    use ReadOnlyTrait;
    protected $connection = 'mysql';
    protected $table = 'personal_details';

    public function workdetails()
    {
        return $this->hasOne(EmployeeWorks::class,'emp_id','emp_id')->where('active','Y');
    }
}
