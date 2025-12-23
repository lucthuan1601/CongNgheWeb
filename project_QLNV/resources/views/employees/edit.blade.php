@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0">Sửa thông tin nhân viên</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('employees.update',$employee->id)}}" method="POST">
            @csrf
            @method('PUT')
        @if ($errors->any())
        <div class="alert alert-danger shadow-sm">
        <strong>Rất tiếc!</strong> Có lỗi xảy ra:
            <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @endif
            {{-- 	Tên nhân viên  --}}
            <div class="mb-3">
                <label class="form-label">Tên nhân viên</label>
                <input type="text" name="name" class="form-control" value="{{ $employee->name }}" required>
            </div>

            {{-- Email  --}}
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $employee->email }}" required>
            </div>

            {{-- o	Số điện thoại--}}
            <div class="mb-3">
                <label class="form-label">Số điện thoại</label>
                <input type="text" name="phone" class="form-control" value="{{ $employee->phone }}" required>
            </div>

            {{--	Phòng ban   --}}
            <div class="mb-3">
                <label class="form-label">Phòng ban </label>
                <select name="department_id" class="form-select" required>
                    <option value="{{ $employee->department->id }}">{{ $employee->department->name }}</option>
                </select>
            </div>
            {{-- chức vị --}}
             <div class="mb-3">
                <label class="form-label">chức vị</label>
                <input type="text" name="position" class="form-control" value="{{ $employee->position }}" required>
            </div>
            {{-- Lương --}}
             <div class="mb-3">
                <label class="form-label">Lương</label>
                <input type="text" name="salary" class="form-control" value="{{ $employee->salary }}" required>
            </div>
            <div class="text-end">
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                    Quay lại
                </a>
                <button type="submit" class="btn btn-success">
                    cập nhật 
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
