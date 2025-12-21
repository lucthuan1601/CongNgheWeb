@extends('layouts.app')


@section('content')

<div class="card">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0">Cập đồ án</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('theses.update',$thesis->id)}}" method="POST">
            @csrf
            @method('PUT')
            {{-- tiêu đề --}}
            <div class="mb-3">
                <label class="form-label">Tiêu đề</label>
                <input type="text" name="title" class="form-control" value="{{ $thesis->title }}" required>
            </div>
            {{-- Chương trình--}}
            <div class="mb-3">
                <label class="form-label">Chương trình</label>
                <input type="text" name="program" class="form-control" value="{{ $thesis->program }}" required>
            </div>
            {{-- Người hướng dẫn --}}
            <div class="mb-3">
                <label class="form-label">Người hướng dẫn</label>
                <input type="text" name="supervisor" class="form-control" value="{{ $thesis->supervisor }}" required>
            </div>
            {{-- Sinh viên --}}
            <div class="mb-3">
                <label class="form-label">Sinh viên</label>
                <select name="student_id" class="form-select" >
                    <option value="{{ $thesis->student->id }}">
                        {{ $thesis->student->first_name }} {{ $thesis->student->last_name }} (Mã SV: {{ $thesis->student->student_number }})
                    </option>
                </select>
            </div>
            {{-- Ngày nộp đồ án --}}
            <div class="mb-3">
                <label class="form-label">Ngày nộp đồ án</label>
                <input type="datetime-local" name="submission_date" class="form-control" value="{{ \Carbon\Carbon::parse($thesis->submission_date)->format('Y-m-d\TH:i') }}" required>
            </div>
            {{-- Ngày bảo vệ--}}
            <div class="mb-3">
                <label class="form-label">Ngày bảo vệ</label>
                <input type="datetime-local" name="defense_date" class="form-control" value="{{ \Carbon\Carbon::parse($thesis->defense_date)->format('Y-m-d\TH:i') }}" required>
            </div>
            {{-- tóm tắt --}}
             <div class="mb-3">
                <label class="form-label">Nội dung Tóm tắt</label>
                <textarea name="abstract" class="form-control" row="10"  required>{{ $thesis->abstract }}</textarea>
            </div>
            <div class="text-end">
                <a href="{{ route('theses.index') }}" class="btn btn-secondary">
                    Quay lại
                </a>
                <button type="submit" class="btn btn-success">
                    Lưu đồ án
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
