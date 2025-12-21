@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    @if (session('success'))
        <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <h4>Danh sách sinh viên</h4>
    <a href="{{ route('students.create') }}" class="btn btn-success">
        + Thêm sinh viên 
    </a>
</div>

<table class="table table-bordered table-hover align-middle">
    <thead class="table-dark text-center">
        <tr>
            <th>ID</th>
            <th>Họ</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Mã sinh viên</th>
            <th>Thời điểm đăng ký</th>
            <th>Thời điểm cập nhật </th>
            <th width="160">Hành động</th>
        </tr>
    </thead>

    <tbody>
        @foreach($students as $student)
        <tr>
            <td class="text-center">{{ $student->id }}</td>
            <td>{{ $student->first_name }}</td>
            <td>{{ $student->last_name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->student_number }}</td>
            <td>{{ $student->created_at }}</td>
            <td>{{ $student->updated_at }}</td>
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
