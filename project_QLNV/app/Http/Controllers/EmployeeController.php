<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Department;
use App\Models\Employee;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('department')
        ->orderBy('id','desc')
        ->paginate(10);
        return view('employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('employees.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        try{
            $data = $request->validated();
            $data ['created_at'] = now();
            $data ['updated_at'] = now();
            DB::table('employees')->insert($data);
            return redirect()->route('employees.index')
            ->with('success','đã thêm nhân viên mới');
        }catch(Exception $e) {
            return back()->withInput(['error'=>'lỗi hệ thống'.$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::with('department')->where('id',$id)->first();
        return view('employees.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, string $id)
    {
        $data = $request->validated();
        $data ['created_at'] = now();
        $data ['updated_at'] = now();
        DB::table('employees')->where('id',$id)
        ->update($data);
        return redirect()->route('employees.index')
        ->with('success','Đã sửa thông tin nhân viên');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('employees')->where('id',$id)
        ->delete();
        return redirect()->route('employees.index')
        ->with('success','Đã xóa nhân viên');
    }
}
