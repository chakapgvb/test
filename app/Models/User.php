<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\{Employee,Branch};

class User extends Authenticatable
{
    //use HasFactory, Notifiable;
     protected $connection = 'Employees';
    protected $table = 'employees';
    protected $primaryKey = 'SNo';


    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function getAuthPassword() {
        return bcrypt($this->Pwd);
    }
    
    /*public function role()
    {
        return $this->HasOne('App\Models\Role','emp_id','ECode');
    }
    public function user_master()
    {
        return $this->HasOne('App\Models\user_master','emp_id','ECode');
    }
    public function salary()
    {
        return $this->HasOne('App\Models\salary','empcode','ECode');
    }
    public function twofactor()
    {
        return $this->HasOne('App\Models\twofactor','emp_id','ECode');
    }*/

}
