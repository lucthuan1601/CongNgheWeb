<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIssueRequest;
use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Support\Facades\DB;
use PSpell\Dictionary;

class IssuesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues = Issue::with('computer')
        ->orderBy('reported_date','desc')
        ->paginate(10);
        return view('issues.index',compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $computers = Computer::all();
        return view('issues.create',compact(var_name: 'computers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIssueRequest $request)
    {
        DB::table('issues')->insert([
            'computer_id' => $request->get('computer_id'),
            'reported_by' =>$request->get('reported_by'),
            'reported_date' =>$request->get('reported_date'),
            'description' =>$request->get('description'),
            'urgency' =>$request->get('urgency'),
            'status' =>$request->get('status'),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        return redirect()->route('issues.index')
        ->with('success', 'Thêm vấn đề mới thành công');
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
        //
        $issue = DB::table('issues')->where('id',$id)->first();
        if(!$issue){
            abort(404);
        }
        $computers = Computer::all();
        return view('issues.edit',compact('issue','computers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreIssueRequest $request, string $id)
    {
        DB::table('issues')->where('id',$id)
        ->update([
            'computer_id' => $request->get('computer_id'),
            'reported_by' =>$request->get('reported_by'),
            'reported_date' =>$request->get('reported_date'),
            'description' =>$request->get('description'),
            'urgency' =>$request->get('urgency'),
            'status' =>$request->get('status'),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        return redirect()->route('issues.index')
        ->with('success','Đã cập nhật mới vấn đề');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('issues')->where('id',$id)
        ->delete();
        return redirect()->route('issues.index')
        ->with('success','Xóa thành công');
    }
}
