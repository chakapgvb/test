<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeWorks extends Model
{
    use HasFactory;
    protected $connection = 'hrms';
    protected $table = 'emp_cur_works';

    public function branchdata()
    {
        return $this->hasOne(Branch::class,'BCODE','office_code');
    }

}
