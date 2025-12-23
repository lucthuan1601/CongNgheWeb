@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    @if (session('success'))
        <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif()
    <h4>Danh sách sính viên</h4>
    <a href="{{ route('students.create') }}" class="btn btn-success">
        + Thêm sinh viên 
    </a>
</div>

<table class="table table-bordered table-hover align-middle">
    <thead class="table-dark text-center">
        <tr>
            <th>Mã sinh viên</th>
            <th>Tên sinh viên</th>
            <th>Email</th>
            <th>số điện thoại</th>
            <th>Ngày sinh</trh>
            <th>Tên lớp học</th>
            <th>Giới tính</th>
            <th>Trạng thái</th>
            <th width="160">Hành động</th>
        </tr>
    </thead>

    <tbody>
        @foreach($students as $student)
        <tr>
            <td class="text-center">{{ $student->student_code }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->phone }}</td>
            <td>{{ $student->date_of_birth }}</td>
            <td>{{ $student->classe->class_name }}</td>
            <td>{{ $student->gender }}</td>
            <td class="text-center">
                <span class="badge 
                    @if($student->status == 'Đang học') bg-danger
                    @elseif($student->status == 'Nghỉ học') bg-warning
                    @else bg-success
                    @endif">
                    {{ $student->status }}
                </span>
            </td>
            <td class="text-center">
                <a href="{{ route('students.edit',$student->id )}}" 
                   class="btn btn-sm btn-warning">
                    Sửa
                </a>
                <form action="{{ route('students.destroy',$student->id) }}" 
                      method="POST" class="d-inline"
                      onsubmit="return confirm('Bạn có chắc chắn muốn xóa vấn đề này?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">
                        Xóa
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- PHÂN TRANG --}}
<div class="d-flex justify-content-center">
    {{ $students->links('pagination::bootstrap-5') }}
</div>

@endsection
