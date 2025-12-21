<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Requests\ThesesRequest;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Theses;
use App\Models\Thesis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ThesesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $theses = Thesis::with('student')->orderBy('updated_at','desc')->paginate(5);
        return view('theses.index', compact('theses'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        return view('theses.create',compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ThesesRequest $request)
    {
        DB::table('theses')->insert([
            'title'=>$request->get('title'),
            'student_id'=>$request->get('student_id'),
            'program'=>$request->get('program'),
            'supervisor'=>$request->get('supervisor'),
            'abstract'=>$request->get('abstract'),
            'submission_date'=>$request->get('submission_date'),
            'defense_date'=>$request->get('defense_date'),
            'created_at'=> now(),
            'updated_at'=>now()
        ]);
        return Redirect()->route('theses.index')
        ->with('success','Thêm đồ án mới thành công');
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
        $thesis = Thesis::with('student')->where('id',$id)->first();
        return view('theses.edit',compact('thesis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ThesesRequest $request, string $id)
    {
        DB::table('theses')->where('id',$id)
        ->update([
            'title'=>$request->get('title'),
            'student_id'=>$request->get('student_id'),
            'program'=>$request->get('program'),
            'supervisor'=>$request->get('supervisor'),
            'abstract'=>$request->get('abstract'),
            'submission_date'=>$request->get('submission_date'),
            'defense_date'=>$request->get('defense_date'),
            'created_at'=> now(),
            'updated_at'=>now()
        ]);
        return Redirect()->route('theses.index')
        ->with('success','Sửa thông tin đồ án thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('theses')->where('id',$id)->delete();
        return redirect()->route('theses.index')
        ->with('success','Xóa thành công');

    }
}
