<?php

namespace App\Http\Controllers\demoprod;

use App\Http\Controllers\demoprod\Controller;
use Illuminate\Http\Request;
use App\Models\PersonalDetails;
use Session;

class DemoController extends Controller
{
    //
    public function index()
    {
        $pdetails = PersonalDetails::where('emp_id',Session::get('employee_id'))->with('workdetails.branchdata')->first();
        return view('demoprod.home')->with(compact('pdetails'));
    }

    public function hello(Request $request)
    {
        return $request->all();
    }
    
    public function sample_function(Request $request)
    {
        try
        {
            $this->validate($request,[

                'title' => 'required|max:5',
                'name' => 'required|max:50|regex:/^[a-zA-Z\s]+$/',
                'income' => 'required|max:8|regex:/^[0-9]+$/',
                'address' => 'required|max:150|regex:/^[A-Za-z0-9 -]+$/', 
                'state' => 'required|max:50|regex:/^[A-Za-z]+$/',
                'pincode' => 'required|digits:6',
                'city' => 'required|max:50|regex:/^[A-Za-z]+$/',
                'email'    => 'required|email|max:50',
                'phone' => 'required|regex:/[6-9]{1}[0-9]{9}/|max:50',
                'location' => 'required|max:150|regex:/^[A-Za-z0-9 -]+$/',
                'branch' => 'required|max:4|regex:/^[0-9]+$/',
              
            ]/*,['captcha.captcha'=>'Invalid captcha code.']*/);
            
        }
        catch(\Exception $e)
        {
            return redirect()->with('failure','Cannot proceed further due to error '.$e->getMessage());
        }
    }
    
}
