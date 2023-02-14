<?php

namespace App\Http\Controllers\demoprod;

use Illuminate\Http\Request;
use App\Models\{Branch,Employee};
use Auth;
use Session;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller {
    public function index(Request $request)	{

        if($request->session()->has('employee_id')) {
            return redirect()->route('home'); 
        } else 
        {            
            return view('login');
        }
    }
    public function login(Request $request) {
		/*$this->validate($request,[
            'employee_id' => 'required|max:4|regex:/^[0-9]+$/',
            'password' => 'required|max:20|regex:/^[A-Za-z0-9-@!#$^%&8()]+$/', 
            'captcha' => 'required|captcha'
        ],['captcha.captcha'=>'Invalid captcha code.']
        );*/

        $this->validate($request,[
            'employee_id' => 'required|max:4|regex:/^[0-9]+$/',
            'password' => 'required|max:20|regex:/^[A-Za-z0-9-@!#$^%&8()]+$/'
        ],['captcha.captcha'=>'Invalid captcha code.']
        );

        
        $emparray = Employee::where('ecode',request('employee_id'))->select('name','pwd')->first()->toArray();
        $credentials = [
            'ECode' => $request['employee_id'],
            'password' => $request['password'],
        ];

        if($emparray) 
        {
            if (Auth::attempt($credentials)==false)
            {            
                session(['employee_name' => $emparray['name']]);
                session(['employee_id' => request('employee_id')]);            
                return redirect()->route('home');          
            } 
            else 
            {        
                return redirect('login')->with('error',"Incorrect Employee Code or Password");
            }   
        }     
    }
    public  function logout(Request $request){
        $request->session()->flush();
        return redirect('login')->with('logout',"Successfully Logout");
    }
    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}

