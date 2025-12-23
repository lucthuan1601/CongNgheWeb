<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Classe;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('classe')
        ->orderBy('id','desc')
        ->paginate(10);
        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classe::all();
        return view('students.create',compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        try{
            $data = $request->validated();
            $data ['created_at'] = now();
            $data ['updated_at'] = now();
            DB::table('students')->insert($data);
            return redirect()->route('students.index')
            ->with('success','đã thêm sinh viên mới');
        }catch(\Exception $e) {
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
        $student = Student::with('classe')->where('id',$id)->first();
        return view('students.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, string $id)
    {
        $data = $request->validated();
        $data ['created_at'] = now();
        $data ['updated_at'] = now();
        DB::table('students')->where('id',$id)
        ->update($data);
        return redirect()->route('students.index')
        ->with('success','Đã sửa thông tin sinh viên');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('students')->where('id',$id)
        ->delete();
        return redirect()->route('students.index')
        ->with('success','Đã xóa sinh viên');
    }
}
