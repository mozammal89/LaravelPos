<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get employee data
        $employee = Employee::all();
        return response()->json($employee);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:employees',
            'phone' => 'required|unique:employees'
        ]);

        // $rdate = $request->joning_date;
        // return $rdate;
        // $jdate = $rdate->format('Y-m-d');


        if($request->photo){
            $position = strpos($request->photo,';');
            $sub = substr($request->photo,0,$position);
            $ext = explode('/', $sub)[1];


            $name = time().".".$ext;
            $img = Image::make($request->photo)->resize(240,200);
            $upload_path = 'backend/employee/';
            $image_url = $upload_path.$name;
            $img->save($image_url);

            $employee = new Employee;
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->salary = $request->salary;
            $employee->nid = $request->nid;
            $employee->joning_date = $request->joning_date;
            $employee->address = $request->address;
            $employee->photo = $image_url;
            $employee->save();
        }else{
            $employee = new Employee;
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->salary = $request->salary;
            $employee->nid = $request->nid;
            $employee->joning_date = $request->joning_date;
            $employee->address = $request->address;
            $employee->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = DB::table('employees')->where('id',$id)->first();
        return response()->json($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        if($request->newphoto){

            $employee = Employee::find($id);

            $photo=$employee->photo;

            if($photo){
                $done = unlink($photo);
            }

                $position = strpos($request->newphoto,';');
                $sub = substr($request->newphoto,0,$position);
                $ext = explode('/', $sub)[1];


                $name = time().".".$ext;
                $img = Image::make($request->newphoto)->resize(240,200);
                $upload_path = 'backend/employee/';
                $image_url = $upload_path.$name;
                $img->save($image_url);

                $employee->name = $request->name;
                $employee->email = $request->email;
                $employee->phone = $request->phone;
                $employee->salary = $request->salary;
                $employee->nid = $request->nid;
                $employee->joning_date = $request->joning_date;
                $employee->address = $request->address;
                $employee->photo = $image_url;
                $employee->save();
            
        }else{
            $employee = Employee::find($id);
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->salary = $request->salary;
            $employee->nid = $request->nid;
            $employee->joning_date = $request->joning_date;
            $employee->address = $request->address;
            $employee->save();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id;
        $employee = DB::table('employees')->where('id', $id)->first();
        $photo=$employee->photo;
        if ($photo) {
            unlink($photo);
            DB::table('employees')->where('id', $id)->delete();
        }else{
            DB::table('employees')->where('id', $id)->delete();
        }
    }

    
}
