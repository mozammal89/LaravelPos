<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salary;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    //
    public function Paid(Request $request,$id)
    {
        $ValidateData = $request->validate([
            'salary_month' => 'required',
        ]);
        $year = date('Y');

        $check = DB::table('salaries')->where('employee_id',$id)->where('salary_month',$request->salary_month)->where('salary_year',$year)->first();
        if($check){
            return response()->json('Salary Alrady Paid');
        }else{
        $data = array();
        $data['employee_id']=$id;
        $data['amount']=$request->salary;
        $data['salary_date']=date('d/m/Y');
        $data['salary_month']=$request->salary_month;
        $data['salary_year']=$year;
        DB::table('salaries')->insert($data);
        }
    }

    public function AllSalary(Request $request)
    {
        $salary =DB::table('salaries')->select('salary_month')->groupBy('salary_month')->get();
        return response()->json($salary);
    }

    public function ViewSalary(Request $request, $id)
    {
        $year = date('Y');
        $view = DB::table('salaries')
                ->join('employees','salaries.employee_id','employees.id')
                ->select('employees.name','salaries.*')
                ->where('salaries.salary_month',$id)
                ->where('salary_year',$year)
                ->get();
        return response()->json($view);
    }


    public function EditSalary(Request $request,$id)
    {
        $year = date('Y');
        $view = DB::table('salaries')
                ->join('employees','salaries.employee_id','employees.id')
                ->select('employees.name','employees.email','employees.phone','salaries.*')
                ->where('salaries.id',$id)
                ->first();
                return response()->json($view);
    }


    public function UpdateSalary(Request $request,$id)
    {
        $data = array();
        $data['employee_id']=$request->employee_id;
        $data['amount']=$request->amount;
        $data['salary_date']=date('d/m/Y');
        $data['salary_month']=$request->salary_month;
        DB::table('salaries')->where('id',$id)->update($data);
    }
}
