@extends('layouts.app')

@section('title', 'Danh sách vấn đề')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    @if (session('success'))
        <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif()
    <h4>Danh sách vấn đề</h4>
    <a href="{{ route('issues.create') }}" class="btn btn-success">
        + Thêm vấn đề mới
    </a>
</div>

<table class="table table-bordered table-hover align-middle">
    <thead class="table-dark text-center">
        <tr>
            <th>Mã vấn đề</th>
            <th>Tên máy tính</th>
            <th>Tên phiên bản</th>
            <th>Người báo cáo</th>
            <th>Thời gian báo cáo</th>
            <th>Mức độ</th>
            <th>Trạng thái</th>
            <th width="160">Hành động</th>
        </tr>
    </thead>

    <tbody>
        @foreach($issues as $issue)
        <tr>
            <td class="text-center">{{ $issue->id }}</td>
            <td>{{ $issue->computer->computer_name }}</td>
            <td>{{ $issue->computer->model }}</td>
            <td>{{ $issue->reported_by }}</td>
            <td>{{ $issue->reported_date }}</td>
            <td class="text-center">
                <span class="badge 
                    @if($issue->urgency == 'High') bg-danger
                    @elseif($issue->urgency == 'Medium') bg-warning
                    @else bg-success
                    @endif">
                    {{ $issue->urgency }}
                </span>
            </td>
            <td class="text-center">
                <span class="badge 
                    @if($issue->status == 'Open') bg-secondary
                    @elseif($issue->status == 'In Progress') bg-primary
                    @else bg-success
                    @endif">
                    {{ $issue->status }}
                </span>
            </td>
            <td class="text-center">
                <a href="{{ route('issues.edit',$issue->id )}}" 
                   class="btn btn-sm btn-warning">
                    Sửa
                </a>
                <form action="{{ route('issues.destroy',$issue->id) }}" 
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
    {{ $issues->links('pagination::bootstrap-5') }}
</div>

@endsection
