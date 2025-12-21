@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    @if (session('success'))
        <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <h4>Danh sách đồ án</h4>
    <a href="{{ route('theses.create') }}" class="btn btn-success">
        + Thêm đồ án
    </a>
</div>

<table class="table table-bordered table-hover align-middle">
    <thead class="table-dark text-center">
        <tr>
            {{-- id --}}
            <th>ID</th> 
            {{-- title --}}
            <th>Tiêu đề</th>
            {{-- program --}}
            <th>chương trình</th>
            {{-- supervisor --}}
            <th>Người hướng dẫn</th>
            {{-- students first_name --}}
            <th>Họ sinh viên</th>
            {{-- students last_name --}}
            <th>Tên sinh viên</th>
            {{-- submission_date --}}
            <th>Ngày nộp đồ án</th>
            {{-- defense_date --}}
            <th>Ngày bảo vệ</th>
            {{-- tóm tắt --}}
            <th>Nội dung Tóm tắt</th>
            <th width="160">Hành động</th>
        </tr>
    </thead>

    <tbody>
        @foreach($theses as $thesis)
        <tr>
            <td class="text-center">{{ $thesis->id }}</td>
            <td>{{ $thesis->title }}</td>
            <td>{{ $thesis->program }}</td>
            <td>{{ $thesis->supervisor }}</td>
            <td>{{ $thesis->student->first_name }}</td>
            <td>{{ $thesis->student->last_name }}</td>
            <td>{{ $thesis->submission_date }}</td>
            <td>{{ $thesis->defense_date }}</td>
            <td>{{ $thesis->abstract }}</td>
            <td class="text-center">
                <a href="{{ route('theses.edit',$thesis->id )}}" 
                   class="btn btn-sm btn-warning">
                    Sửa
                </a>
                <form action="{{ route('theses.destroy',$thesis->id) }}" 
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
    {{ $theses->links('pagination::bootstrap-5') }}
</div>

@endsection
