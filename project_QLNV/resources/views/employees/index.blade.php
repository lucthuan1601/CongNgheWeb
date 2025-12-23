@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    @if (session('success'))
        <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif()
    <h4>Danh sách nhân viên</h4>
    <a href="{{ route('employees.create') }}" class="btn btn-success">
        + Thêm nhân viên 
    </a>
</div>

<table class="table table-bordered table-hover align-middle">
    <thead class="table-dark text-center">
        <tr>
            <th>Mã nhân viên</th>
            <th>Tên nhân viên</th>
            <th>Email</th>
            <th>số điện thoại</th>
            <th>Tên phòng ban</trh>
            <th>Chức vị</th>
            <th>Lương</th>
            <th width="160">Hành động</th>
        </tr>
    </thead>

    <tbody>
        @foreach($employees as $employee)
        <tr>
            <td class="text-center">{{ $employee->id }}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->phone }}</td>
            <td>{{ $employee->department->name }}</td>
            <td>{{ $employee->position }}</td>
            <td>{{ $employee->salary }}</td>
            <td class="text-center">
                <a href="{{ route('employees.edit',$employee->id )}}" 
                   class="btn btn-sm btn-warning">
                    Sửa
                </a>
                <form action="{{ route('employees.destroy',$employee->id) }}" 
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
    {{ $employees->links('pagination::bootstrap-5') }}
</div>

@endsection
