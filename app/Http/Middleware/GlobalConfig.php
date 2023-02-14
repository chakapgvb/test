<?php

namespace App\Http\Middleware;
use Closure;
use Session;
use App\Models\Branch;
use App\Models\EmployeeWorks;

class GlobalConfig
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->session()->has('employee_id')) 
        {
            $empwork = EmployeeWorks::where('emp_id',Session::get('employee_id'))->where('active','Y')->first();
            $branchdata = Branch::where('bcode',$empwork->office_code)->select('bcode','branchname','ro','region_id')->first()->toArray();

			config(['branchcode'=> $branchdata['bcode']]);
            config(['branchname'=> $branchdata['branchname']]);
            config(['roname'=> $branchdata['ro']]);
            config(['rocode'=> $branchdata['region_id']]);
            
			$roCodes = array('9001','9002','9003','9004','9005','9006','9007','9008','9009','9010','9011','9012','9013','9014');
            if(in_array( $branchdata['bcode'], $roCodes)) {
                config(['branchtype'=> 'RegionalOffice']);
            } elseif($branchdata['bcode']=='9000'||$branchdata['bcode']=='9909'||$branchdata['bcode']=='9908') {
                config(['branchtype'=> 'HeadOffice']);
            } else {
                config(['branchtype'=> 'BranchOffice']);
            }
		}
		return $next($request);
    }
}
