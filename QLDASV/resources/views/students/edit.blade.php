@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0">Sửa thông tin sinh viên</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('students.update',$student->id)}}" method="POST">
            @csrf
            @method('PUT')
            {{-- Họ --}}
            <div class="mb-3">
                <label class="form-label">Họ</label>
                <input type="text" name="first_name" class="form-control" value="{{ $student->first_name }}" required>
            </div>
            {{-- Tên --}}
            <div class="mb-3">
                <label class="form-label">Tên</label>
                <input type="text" name="last_name" class="form-control" value="{{ $student->last_name }}" required>
            </div>
            {{-- email --}}
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" value="{{ $student->email }}" required>
            </div>
            {{-- mã sinh viên --}}
            <div class="mb-3">
                <label class="form-label">Mã sinh viên</label>
                <input type="text" name="student_number" class="form-control" value="{{ $student->student_number}}" required>
            </div>

            <div class="text-end">
                <a href="{{ route('students.index') }}" class="btn btn-secondary">
                    Quay lại
                </a>
                <button type="submit" class="btn btn-success">
                    Cập nhật
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
