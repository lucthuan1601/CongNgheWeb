@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0">Thêm nhân viên</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('employees.store')}}" method="POST">
            @csrf
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
                <input type="text" name="name" class="form-control" required>
            </div>

            {{-- Email  --}}
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            {{-- o	Số điện thoại--}}
            <div class="mb-3">
                <label class="form-label">Số điện thoại</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            {{--	Phòng ban   --}}
            <div class="mb-3">
                <label class="form-label">Phòng ban </label>
                <select name="department_id" class="form-select" required>
                    <option value="">--Chọn một phòng ban--</option>
                    @foreach ($departments as $department)
                    <option value="{{ $department->id }}" >{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- chức vị --}}
             <div class="mb-3">
                <label class="form-label">chức vị</label>
                <input type="text" name="position" class="form-control" required>
            </div>
            {{-- Lương --}}
             <div class="mb-3">
                <label class="form-label">Lương</label>
                <input type="text" name="salary" class="form-control" required>
            </div>
            <div class="text-end">
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                    Quay lại
                </a>
                <button type="submit" class="btn btn-success">
                    Lưu nhân viên 
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
