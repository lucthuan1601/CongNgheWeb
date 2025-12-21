@extends('layouts.app')


@section('content')

<div class="card">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0">Thêm sinh viên</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('students.store')}}" method="POST">
            @csrf
            {{-- Họ --}}
            <div class="mb-3">
                <label class="form-label">Họ</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>
            {{-- Tên --}}
            <div class="mb-3">
                <label class="form-label">Tên</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>
            {{-- email --}}
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" required>
            </div>
            {{-- mã sinh viên --}}
            <div class="mb-3">
                <label class="form-label">Mã sinh viên</label>
                <input type="text" name="student_number" class="form-control" required>
            </div>
            {{-- Thời gian báo cáo --}}
            {{-- <div class="mb-3">
                <label class="form-label">Thời gian báo cáo</label>
                <input type="datetime-local" name="reported_date" class="form-control" values="{{ now()}}" required>
            </div> --}}

            {{-- Mô tả --}}
            {{-- <div class="mb-3">
                <label class="form-label">Mô tả sự cố</label>
                <textarea name="description" class="form-control" rows="3" required></textarea>
            </div> --}}

            {{-- Mức độ --}}
            {{-- <div class="mb-3">
                <label class="form-label">Mức độ sự cố</label>
                <select name="urgency" class="form-select" required>
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                </select>
            </div> --}}

            {{-- Trạng thái --}}
            {{-- <div class="mb-3">
                <label class="form-label">Trạng thái</label>
                <select name="status" class="form-select">
                    <option value="Open">Open</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Resolved">Resolved</option>
                </select>
            </div> --}}

            <div class="text-end">
                <a href="{{ route('students.index') }}" class="btn btn-secondary">
                    Quay lại
                </a>
                <button type="submit" class="btn btn-success">
                    Lưu sinh viên
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
