@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0">Sửa sinh viên mới</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('students.update',$student->id) }}" method="POST">
            @csrf
            @method('PUT')
            {{-- Hiển thị lỗi Validation --}}
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

            <div class="row">
                {{-- Mã sinh viên --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label font-weight-bold">Mã sinh viên</label>
                    <input type="text" name="student_code" class="form-control" value="{{ $student->student_code }}" placeholder="Nhập mã SV" required>
                </div>

                {{-- Tên sinh viên --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label font-weight-bold">Tên sinh viên</label>
                    <input type="text" name="name" class="form-control" value="{{$student->name }}" placeholder="Nhập họ và tên" required>
                </div>
            </div>

            <div class="row">
                {{-- Email --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label font-weight-bold">Email</label>
                    <input type="email" name="email" class="form-control" value="{{$student->email}}" placeholder="example@gmail.com" required>
                </div>

                {{-- Số điện thoại --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label font-weight-bold">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" value="{{ $student->phone }}" placeholder="Số điện thoại">
                </div>
            </div>

            <div class="row">
                {{-- Ngày sinh --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label font-weight-bold">Ngày sinh</label>
                    <input type="date" name="date_of_birth" class="form-control" value="{{ old($student->date_of_birth) }}">
                </div>

                {{-- Lớp học (Dropdown từ bảng classes) --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label font-weight-bold">Lớp học</label>
                    <select name="class_id" class="form-select" required>
                        <option value="{{ $student->classe->id }}">{{ $student->classe->class_name }}</option>
                    </select>
                </div>
            </div>

            {{-- Địa chỉ --}}
            <div class="mb-3">
                <label class="form-label font-weight-bold">Địa chỉ</label>
                <textarea name="address" class="form-control" rows="2" placeholder="Nhập địa chỉ thường trú">{{$student->address}}</textarea>
            </div>

            <div class="row">
                {{-- Giới tính --}}
               <div class="col-md-6 mb-3">
                    <label class="form-label font-weight-bold">Giới tính</label>
                    <select name="gender" class="form-select">
                        <option value="Nam" {{ old('gender') == 'Nam' ? 'selected' : '' }}>Nam</option>
                        <option value="Nữ" {{ old('gender') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                        <option value="Khác" {{ old('gender') == 'Khác' ? 'selected' : '' }}>Khác</option>
                    </select>
                </div>

                {{-- Trạng thái --}}
                  <div class="col-md-6 mb-3">
                    <label class="form-label font-weight-bold">Trạng thái</label>
                    <select name="status" class="form-select">
                        <option value="Đang học" {{ old('status') == 'Đang học' ? 'selected' : '' }}>Đang học</option>
                        <option value="Nghỉ học" {{ old('status') == 'Nghỉ học' ? 'selected' : '' }}>Nghỉ học</option>
                        <option value="Tốt nghiệp" {{ old('status') == 'Tốt nghiệp' ? 'selected' : '' }}>Tốt nghiệp</option>
                    </select>
                </div>
            </div>

            <div class="text-end mt-3">
                <a href="{{ route('students.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Quay lại
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> cập nhật
                </button>
            </div>
        </form>
    </div>
</div>

@endsection